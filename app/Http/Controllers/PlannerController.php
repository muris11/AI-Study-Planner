<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\PlannerTask;
use App\Models\StudyBlock;
use App\Models\UserPref;
use App\Models\Nudge;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskCompleted;
use App\Models\User;
use App\Services\PlannerAiClient;

class PlannerController extends Controller
{
    /**
     * Display the planner dashboard with tasks, study blocks, and analytics.
     *
     * @param Request $r
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboard(Request $r) {
        try {
            $uid = $r->session()->get('user_id');
            $tasks = PlannerTask::where('user_id',$uid)->where('status', 'pending')->orderBy('due_at')->get();
            $completedTasks = PlannerTask::where('user_id',$uid)->where('status', 'completed')->orderBy('updated_at', 'desc')->get();
            $blocks = StudyBlock::where('user_id',$uid)
                        ->where('start_at','>=', Carbon::now())
                        ->orderBy('start_at')
                        ->with('task') // Load the task relationship
                        ->get();

            Log::channel('planner')->info('Dashboard blocks loaded', [
                'user_id' => $uid,
                'blocks_count' => $blocks->count(),
                'pending_count' => $blocks->where('status', 'pending')->count(),
                'completed_count' => $blocks->where('status', 'completed')->count()
            ]);

            // Brief analytics
            $weekStart = Carbon::now()->startOfWeek();
            $weekEnd = Carbon::now()->endOfWeek();
            $completed = StudyBlock::where('user_id',$uid)->where('status','completed')->whereBetween('start_at',[$weekStart,$weekEnd])->get();
            $totalBlocksWeek = StudyBlock::where('user_id',$uid)->whereBetween('start_at',[$weekStart,$weekEnd])->count();
            $focusMinutes = $completed->sum('actual_minutes');
            $todoCount = PlannerTask::where('user_id',$uid)->where('status','pending')->count();

            return view('planner.dashboard', compact('tasks','completedTasks','blocks','totalBlocksWeek','focusMinutes','todoCount'));
        } catch (\Exception $e) {
            Log::error('Dashboard load failed', ['user_id' => $r->session()->get('user_id'), 'error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to load dashboard. Please try again.']);
        }
    }

    public function tasks(Request $r) {
        $uid = $r->session()->get('user_id');
        $tasks = PlannerTask::where('user_id',$uid)->orderBy('due_at')->get();
        return view('planner.tasks', compact('tasks'));
    }

    public function storeTask(Request $r) {
        $r->validate([
            'title'=>'required',
            'type'=>'required|in:assignment,quiz,exam,study,project',
            'due_at'=>'nullable|date',
            'weight_pct'=>'nullable|integer|min:0|max:40',
            'difficulty'=>'required|integer|min:1|max:5',
            'competency_self'=>'required|integer|min:1|max:5',
            'estimated_effort_hours'=>'required|numeric|min:0.5|max:40'
        ]);
        $uid = $r->session()->get('user_id');
        PlannerTask::create([
            'user_id'=>$uid,
            'course_id'=>null,
            'title'=>$r->title,
            'type'=>$r->type,
            'due_at'=>$r->due_at,
            'weight_pct'=>$r->weight_pct ?? 0,
            'difficulty'=>$r->difficulty,
            'competency_self'=>$r->competency_self,
            'estimated_effort_hours'=>$r->estimated_effort_hours,
            'status'=>'pending',
        ]);
        return redirect()->route('planner.tasks')->with('ok','Task ditambahkan.');
    }

    public function scoreTasks(Request $r, PlannerAiClient $ai) {
        $uid = $r->session()->get('user_id');
        $tasks = PlannerTask::where('user_id',$uid)->get();
        $payload = [
            "timezone"=>"Asia/Jakarta",
            "now"=>Carbon::now()->toIso8601String(),
            "tasks"=>$tasks->map(function($t){
                return [
                    "id"=>$t->id,
                    "due_at"=>$t->due_at? $t->due_at->toIso8601String(): null,
                    "weight_pct"=>$t->weight_pct,
                    "difficulty"=>$t->difficulty,
                    "competency_self"=>$t->competency_self,
                    "estimated_effort_hours"=>$t->estimated_effort_hours,
                ];
            })->values()->toArray()
        ];
        try {
            $resp = $ai->score($payload);
            foreach(($resp['scores'] ?? []) as $row){
                $t = PlannerTask::find($row['id']);
                if($t){
                    $t->priority_components = array_merge($row['components'] ?? [], ["explain" => $row['explain'] ?? null]);
                    $t->save();
                }
            }
            return back()->with('ok','Skor prioritas telah dihitung.');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to score tasks', [
                'user_id' => $uid,
                'error' => $e->getMessage()
            ]);
            return back()->withErrors(['error'=>'Failed to calculate priority scores. Please try again later.']);
        }
    }

    public function schedule(Request $r, PlannerAiClient $ai) {
        $uid = $r->session()->get('user_id');
        $tasks = PlannerTask::where('user_id',$uid)->get()->filter(fn($t)=> isset($t->priority_components['p_final']));

        // Debug: Log task count and check if tasks have priorities
        Log::channel('planner')->info('Schedule attempt', [
            'user_id'=>$uid,
            'total_tasks'=>PlannerTask::where('user_id',$uid)->count(),
            'tasks_with_priorities'=>$tasks->count()
        ]);

        if ($tasks->isEmpty()) {
            return back()->withErrors(['error'=>'No tasks with priority available for scheduling. Please ensure tasks have been prioritized.']);
        }

        // prefs -> free slots dinamis 7 hari
        $prefs = UserPref::firstOrCreate([
            'user_id' => $uid
        ], [
            'preferred_days' => ["Mon" => ["19:00-22:00"], "Wed" => ["19:00-22:00"], "Fri" => ["19:00-22:00"]],
            'pomodoro_minutes' => 25,
            'break_minutes' => 5,
            'max_daily_focus_blocks' => 8
        ]);

        // Fallback: jika user belum memilih hari (array kosong), pakai default aman
        $preferredDays = $prefs->preferred_days ?: [
            "Mon" => ["19:00-22:00"],
            "Wed" => ["19:00-22:00"],
            "Fri" => ["19:00-22:00"],
        ];
        if (empty($prefs->preferred_days)) {
            $prefs->preferred_days = $preferredDays;
            $prefs->save();
        }

        $free = \App\Support\FreeSlots::nextWeek($preferredDays, 7);
        $payload = [
            "timezone"=>"Asia/Jakarta",
            "free_slots"=>$free,
            "tasks"=>$tasks->map(function($t){
                return [
                    "id"=>$t->id,
                    "due_at"=>$t->due_at? $t->due_at->toIso8601String(): null,
                    "weight_pct"=>$t->weight_pct ?? 0,
                    "difficulty"=>$t->difficulty,
                    "competency_self"=>$t->competency_self,
                    "estimated_effort_hours"=>$t->estimated_effort_hours,
                    "p_final"=>$t->priority_components['p_final'] ?? 0,
                    "effort_hours"=>$t->estimated_effort_hours
                ];
            })->values()->toArray(),
            "chunk_minutes"=>$prefs->pomodoro_minutes ?? 45,
            "break_minutes"=>$prefs->break_minutes ?? 10,
            "max_blocks_per_day"=>$prefs->max_daily_focus_blocks ?? 4
        ];

        try {
            // Try AI scheduling first
            $resp = $ai->schedule($payload);

            // Validate AI response for overlaps
            $aiPlan = $resp['plan'] ?? [];
            $validatedPlan = $this->validateAndFixSchedule($aiPlan, $prefs);

            if (empty($validatedPlan)) {
                // If AI fails, use our own scheduling algorithm
                Log::channel('planner')->info('AI scheduling failed or produced overlaps, using fallback algorithm');
                $validatedPlan = $this->createManualSchedule($tasks, $free, $prefs);
            }

            $resp['plan'] = $validatedPlan;

            // Debug: Log the AI response
            Log::channel('planner')->info('AI Schedule response', [
                'user_id'=>$uid,
                'response_keys'=>array_keys($resp),
                'plan_count'=>count($resp['plan'] ?? [])
            ]);

            if (!isset($resp['plan']) || empty($resp['plan'])) {
                return back()->withErrors(['error'=>'AI failed to create schedule. Response: ' . json_encode($resp)]);
            }

            // Clear existing planned blocks and their reminders before creating new ones
            $existingBlocksDeleted = StudyBlock::where('user_id', $uid)
                ->where('status', '!=', 'completed')
                ->delete();

            // Also clear existing pending nudges for this user
            $existingNudgesDeleted = Nudge::where('user_id', $uid)
                ->where('status', 'pending')
                ->delete();

            Log::channel('planner')->info('Cleared existing blocks and nudges', [
                'user_id' => $uid,
                'blocks_deleted' => $existingBlocksDeleted,
                'nudges_deleted' => $existingNudgesDeleted
            ]);

            $blocksCreated = 0;
            $scheduledBlocks = [];

            foreach(($resp['plan'] ?? []) as $blk){
                // Validasi: cek apakah waktu sudah digunakan
                $startTime = $blk['start'];
                $endTime = $blk['end'];

                $overlap = false;
                foreach ($scheduledBlocks as $existing) {
                    if (($startTime < $existing['end'] && $endTime > $existing['start'])) {
                        Log::channel('planner')->warning('Block overlap detected', [
                            'new_block' => $blk,
                            'existing_block' => $existing
                        ]);
                        $overlap = true;
                        break;
                    }
                }

                if ($overlap) {
                    Log::channel('planner')->warning('Skipping overlapping block', ['block' => $blk]);
                    continue;
                }

                try {
                    $block = StudyBlock::create([
                        'user_id'=>$uid,
                        'task_id'=>$blk['task_id'],
                        'start_at'=>$blk['start'],
                        'end_at'=>$blk['end'],
                        'status'=>'pending',
                        'actual_minutes'=>0
                    ]);

                    // Create reminder nudge 15 minutes before the block starts
                    $startDateTime = Carbon::parse($blk['start'], 'Asia/Jakarta');
                    $reminderTime = $startDateTime->copy()->subMinutes(15);

                    $task = PlannerTask::find($blk['task_id']);
                    $taskTitle = $task ? $task->title : 'Belajar';

                    $startFormatted = $startDateTime->format('H:i');
                    $endFormatted = Carbon::parse($blk['end'], 'Asia/Jakarta')->format('H:i');

                    Nudge::create([
                        'user_id' => $uid,
                        'channel' => 'email',
                        'schedule_at' => $reminderTime,
                        'message' => json_encode([
                            'title' => $taskTitle,
                            'start' => $startFormatted,
                            'end' => $endFormatted
                        ]),
                        'status' => 'pending'
                    ]);

                    $scheduledBlocks[] = ['start' => $startTime, 'end' => $endTime, 'task_id' => $blk['task_id']];
                    $blocksCreated++;
                    Log::channel('planner')->info('Block and reminder created', ['block'=>$blk, 'reminder_at'=>$reminderTime]);
                } catch (\Exception $e) {
                    Log::channel('planner')->error('Block creation failed', ['block'=>$blk, 'error'=>$e->getMessage()]);
                }
            }
            Log::channel('planner')->info('Schedule created', ['user_id'=>$uid, 'blocks'=>$blocksCreated, 'ai_blocks'=>count($resp['plan'] ?? [])]);
            
            // Double-check actual blocks created in database
            $actualBlocksCount = StudyBlock::where('user_id', $uid)->where('status', 'pending')->count();
            
            Log::channel('planner')->info('Final verification', [
                'user_id' => $uid,
                'counter_blocks' => $blocksCreated,
                'db_pending_blocks' => $actualBlocksCount,
                'total_db_blocks' => StudyBlock::where('user_id', $uid)->count()
            ]);
            
            return back()->with('ok','Jadwal berhasil dibuat dengan ' . $actualBlocksCount . ' blok belajar.');
        } catch (\Exception $e) {
            Log::channel('planner')->error('Schedule creation failed', [
                'user_id'=>$uid,
                'error'=>$e->getMessage(),
                'payload'=>$payload
            ]);
            return back()->withErrors(['error'=>'Gagal membuat jadwal: ' . $e->getMessage()]);
        }
    }

    /**
     * Validate AI schedule and remove overlaps
     */
    private function validateAndFixSchedule(array $plan, $prefs): array
    {
        $validated = [];
        $scheduledTimes = [];

        foreach ($plan as $block) {
            $startTime = strtotime($block['start']);
            $endTime = strtotime($block['end']);

            // Check for overlaps
            $overlap = false;
            foreach ($scheduledTimes as $existing) {
                if ($startTime < $existing['end'] && $endTime > $existing['start']) {
                    $overlap = true;
                    break;
                }
            }

            if (!$overlap) {
                $validated[] = $block;
                $scheduledTimes[] = ['start' => $startTime, 'end' => $endTime];
            }
        }

        return $validated;
    }

    /**
     * Create manual schedule when AI fails
     */
    private function createManualSchedule($tasks, array $freeSlots, $prefs): array
    {
        $plan = [];
        $chunkMinutes = $prefs->pomodoro_minutes ?? 45;
        $breakMinutes = $prefs->break_minutes ?? 10;
        $maxBlocksPerDay = $prefs->max_daily_focus_blocks ?? 4;

        // Sort tasks by priority (highest first), then by due date (earliest first)
        $sortedTasks = $tasks->sort(function($a, $b) {
            $aPriority = $a->priority_components['p_final'] ?? 0;
            $bPriority = $b->priority_components['p_final'] ?? 0;

            if ($aPriority != $bPriority) {
                return $bPriority <=> $aPriority; // Higher priority first
            }

            // If same priority, earlier due date first
            $aDue = $a->due_at ? strtotime($a->due_at) : PHP_INT_MAX;
            $bDue = $b->due_at ? strtotime($b->due_at) : PHP_INT_MAX;
            return $aDue <=> $bDue;
        });

        // Track blocks per day and task progress
        $dailyBlocks = [];
        $taskProgress = [];

        // Initialize task progress
        foreach ($sortedTasks as $task) {
            $effortHours = $task->estimated_effort_hours ?? 1;
            $taskProgress[$task->id] = [
                'blocks_needed' => ceil(($effortHours * 60) / $chunkMinutes),
                'blocks_scheduled' => 0
            ];
        }

        // Schedule blocks slot by slot, filling each slot completely
        foreach ($freeSlots as $slot) {
            $slotStart = strtotime($slot['start']);
            $slotEnd = strtotime($slot['end']);
            $day = date('Y-m-d', $slotStart);
            $currentTime = $slotStart;

            // Check if we can add more blocks today
            if (($dailyBlocks[$day] ?? 0) >= $maxBlocksPerDay) {
                continue;
            }

            // Fill this slot with blocks
            while ($currentTime + ($chunkMinutes * 60) <= $slotEnd &&
                   ($dailyBlocks[$day] ?? 0) < $maxBlocksPerDay) {

                // Find the highest priority task that still needs blocks
                $selectedTask = null;
                foreach ($sortedTasks as $task) {
                    $taskId = $task->id;
                    if ($taskProgress[$taskId]['blocks_scheduled'] < $taskProgress[$taskId]['blocks_needed']) {
                        $selectedTask = $task;
                        break;
                    }
                }

                // If no task needs blocks, break
                if (!$selectedTask) {
                    break;
                }

                $taskId = $selectedTask->id;
                $blockEnd = $currentTime + ($chunkMinutes * 60);

                $plan[] = [
                    'task_id' => $taskId,
                    'start' => date('c', $currentTime),
                    'end' => date('c', $blockEnd)
                ];

                $taskProgress[$taskId]['blocks_scheduled']++;
                $dailyBlocks[$day] = ($dailyBlocks[$day] ?? 0) + 1;

                // Move to next time slot (with break)
                $currentTime = $blockEnd + ($breakMinutes * 60);
            }
        }

        Log::channel('planner')->info('Manual scheduling completed', [
            'total_blocks' => count($plan),
            'task_progress' => $taskProgress,
            'daily_blocks' => $dailyBlocks
        ]);

        return $plan;
    }

    public function completeBlock(Request $r, $id) {
        $r->validate([
            'actual_minutes' => 'nullable|integer|min:1|max:480' // Max 8 hours
        ]);
        
        $uid = $r->session()->get('user_id');
        $blk = StudyBlock::where('user_id',$uid)->where('id',$id)->firstOrFail();
        
        $blk->status = 'completed';
        $blk->actual_minutes = $r->actual_minutes ?? $blk->start_at->diffInMinutes($blk->end_at);
        $blk->save();
        
        // Check if all blocks for this task are completed
        $taskCompleted = false;
        $completionStats = null;
        if ($blk->task_id) {
            $totalBlocks = StudyBlock::where('task_id', $blk->task_id)->where('user_id', $uid)->count();
            $completedBlocks = StudyBlock::where('task_id', $blk->task_id)->where('user_id', $uid)->where('status', 'completed')->count();
            
            if ($totalBlocks > 0 && $totalBlocks === $completedBlocks) {
                // All blocks completed, mark task as completed
                $task = PlannerTask::where('id', $blk->task_id)->where('user_id', $uid)->first();
                if ($task) {
                    $task->status = 'completed';
                    $task->save();
                    $taskCompleted = true;
                    
                    // Calculate completion statistics
                    $allBlocks = StudyBlock::where('task_id', $blk->task_id)->where('user_id', $uid)->get();
                    $totalPlannedMinutes = $allBlocks->sum(function($b) {
                        return $b->start_at->diffInMinutes($b->end_at);
                    });
                    $totalActualMinutes = $allBlocks->sum('actual_minutes');
                    $completionStats = [
                        'total_blocks' => $totalBlocks,
                        'planned_hours' => round($totalPlannedMinutes / 60, 1),
                        'actual_hours' => round($totalActualMinutes / 60, 1),
                        'efficiency' => $totalPlannedMinutes > 0 ? round(($totalActualMinutes / $totalPlannedMinutes) * 100, 1) : 0
                    ];
                    
                    // Send completion email
                    $user = User::find($uid);
                    if ($user && $user->email) {
                        try {
                            Log::info('Sending task completion email', [
                                'user_id' => $uid,
                                'user_email' => $user->email,
                                'task_id' => $task->id
                            ]);
                            Mail::to($user->email)->send(new TaskCompleted($task, $completionStats));
                            Log::info('Task completion email sent successfully', [
                                'user_id' => $uid,
                                'task_id' => $task->id
                            ]);
                        } catch (\Exception $e) {
                            Log::error('Failed to send task completion email', [
                                'user_id' => $uid,
                                'task_id' => $task->id,
                                'error' => $e->getMessage(),
                                'trace' => $e->getTraceAsString()
                            ]);
                        }
                    } else {
                        Log::warning('No user email found for task completion notification', [
                            'user_id' => $uid,
                            'task_id' => $task->id
                        ]);
                    }
                }
            }
        }
        
        if ($taskCompleted) {
            $message = sprintf(
                '🎉 Tugas selesai! Semua %d blok belajar telah diselesaikan. Direncanakan: %.1f jam, Aktual: %.1f jam (%.1f%% efisiensi).',
                $completionStats['total_blocks'],
                $completionStats['planned_hours'],
                $completionStats['actual_hours'],
                $completionStats['efficiency']
            );
        } else {
            $message = 'Blok telah ditandai sebagai selesai.';
        }
        
        return back()->with('ok', $message);
    }

    public function explain(Request $r, $taskId) {
        $uid = $r->session()->get('user_id');
        if (!$uid) {
            return redirect()->route('login.form')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
        }
        
        $task = PlannerTask::where('user_id',$uid)->where('id',$taskId)->first();
        if (!$task) {
            return redirect()->route('planner.dashboard')->withErrors(['error' => 'Tugas tidak ditemukan.']);
        }
        
        return view('planner.explain', compact('task'));
    }

    public function testEmail(Request $r) {
        try {
            $user = User::find($r->session()->get('user_id'));
            if (!$user || !$user->email) {
                return response()->json(['error' => 'No user email']);
            }
            
            // Create a dummy task for testing
            $task = (object) [
                'id' => 1,
                'title' => 'Test Task',
                'type' => 'assignment',
                'updated_at' => now()
            ];
            
            $stats = [
                'total_blocks' => 2,
                'planned_hours' => 2.0,
                'actual_hours' => 1.5,
                'efficiency' => 75.0
            ];
            
            Mail::to($user->email)->send(new TaskCompleted($task, $stats));
            
            return response()->json(['success' => 'Email sent to ' . $user->email]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function prefs(Request $r) {
        $uid = $r->session()->get('user_id');
        $prefs = UserPref::firstOrCreate(['user_id'=>$uid], []);
        return view('planner.prefs', compact('prefs'));
    }

    public function savePrefs(Request $r) {
        $uid = $r->session()->get('user_id');
        $data = $r->validate([
            'days' => 'array',
            'days.*' => 'string|in:Mon,Tue,Wed,Thu,Fri,Sat,Sun',
            'pomodoro_minutes' => 'required|integer|min:15|max:60',
            'break_minutes' => 'required|integer|min:5|max:15',
            'max_daily_focus_blocks' => 'required|integer|min:2|max:10',
        ]);

        // Validate time inputs
        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        foreach ($days as $day) {
            $start = $r->input("start_time_{$day}");
            $end = $r->input("end_time_{$day}");
            if ($start && !preg_match('/^\d{2}:\d{2}$/', $start)) {
                return back()->withErrors(["start_time_{$day}" => 'Format waktu tidak valid']);
            }
            if ($end && !preg_match('/^\d{2}:\d{2}$/', $end)) {
                return back()->withErrors(["end_time_{$day}" => 'Format waktu tidak valid']);
            }
            if ($start && $end && strtotime($start) >= strtotime($end)) {
                return back()->withErrors(["end_time_{$day}" => 'Waktu akhir harus lebih besar dari waktu mulai']);
            }
        }

        // Build preferred_days from form
        $preferredDays = [];
        if ($r->has('days')) {
            foreach ($r->days as $day) {
                $start = $r->input("start_time_{$day}", '19:00');
                $end = $r->input("end_time_{$day}", '22:00');
                if (!$start || !$end) continue;
                $preferredDays[$day] = ["{$start}-{$end}"];
            }
        }

        $prefs = UserPref::updateOrCreate(['user_id' => $uid], [
            'preferred_days' => $preferredDays,
            'pomodoro_minutes' => $data['pomodoro_minutes'],
            'break_minutes' => $data['break_minutes'],
            'max_daily_focus_blocks' => $data['max_daily_focus_blocks'],
        ]);

        return back()->with('ok', 'Preferensi berhasil disimpan.');
    }

    public function editTask(Request $r, PlannerTask $task) {
        // Ownership enforced via route-model binding (routes/web.php)
        $uid = $r->session()->get('user_id');
        $tasks = PlannerTask::where('user_id',$uid)->orderBy('due_at')->get();
        return view('planner.tasks', compact('task', 'tasks'));
    }

    public function updateTask(Request $r, PlannerTask $task) {
        // Ownership enforced via route-model binding

        $r->validate([
            'title'=>'required',
            'type'=>'required|in:assignment,quiz,exam,study,project',
            'due_at'=>'nullable|date',
            'weight_pct'=>'nullable|integer|min:0|max:40',
            'difficulty'=>'required|integer|min:1|max:5',
            'competency_self'=>'required|integer|min:1|max:5',
            'estimated_effort_hours'=>'required|numeric|min:0.5|max:40'
        ]);

        $task->update([
            'title'=>$r->title,
            'type'=>$r->type,
            'due_at'=>$r->due_at,
            'weight_pct'=>$r->weight_pct ?? 0,
            'difficulty'=>$r->difficulty,
            'competency_self'=>$r->competency_self,
            'estimated_effort_hours'=>$r->estimated_effort_hours,
        ]);

        return redirect()->route('planner.tasks')->with('ok','Tugas berhasil diperbarui.');
    }

    public function showTask(Request $r, PlannerTask $task) {
        // Ownership enforced via route-model binding
        // Redirect to edit page since we don't have a separate show view
        return redirect()->route('planner.tasks.edit', $task);
    }

    public function deleteTask(Request $r, PlannerTask $task) {
        // Ownership enforced via route-model binding

        $task->delete();
        return redirect()->route('planner.tasks')->with('ok','Tugas berhasil dihapus.');
    }

    public function deleteBlock(Request $r, StudyBlock $block) {
        // Ownership enforced via route-model binding

        $block->delete();
        return redirect()->route('planner.dashboard')->with('ok','Blok belajar berhasil dihapus.');
    }

    // GET /planner/schedule should just go back to dashboard
    public function scheduleGet()
    {
        return redirect()->route('planner.dashboard');
    }

    // Accidental GET on complete URL
    public function completeGet($id)
    {
        return redirect()->route('planner.dashboard')->withErrors(['error' => 'Aksi ini harus melalui tombol "Tandai Selesai".']);
    }

    public function showBlock(Request $r, StudyBlock $block) {
        // Ensure user owns this block
        if ($block->user_id !== $r->session()->get('user_id')) {
            abort(403);
        }
        // For now, redirect to dashboard since we don't have a separate block view
        return redirect()->route('planner.dashboard')->with('info', 'Detail blok belajar dapat dilihat di dashboard.');
    }

    public function tutorial() {
        return view('planner.tutorial');
    }

}
    
