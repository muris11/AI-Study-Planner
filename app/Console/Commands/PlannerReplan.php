<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\PlannerTask;
use App\Models\UserPref;
use App\Services\PlannerAiClient;
use App\Support\FreeSlots;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PlannerReplan extends Command
{
    protected $signature = 'planner:replan';
    protected $description = 'Re-score & re-schedule for all users';

    public function handle(PlannerAiClient $ai) {
        foreach (User::pluck('id') as $uid) {
            // Score tasks
            $tasks = PlannerTask::where('user_id',$uid)->get();
            $payloadScore = [
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
            $resp = $ai->score($payloadScore);
            foreach(($resp['scores'] ?? []) as $row){
                $t = PlannerTask::find($row['id']);
                if($t){
                    $t->priority_components = array_merge($row['components'] ?? [], ["explain" => $row['explain'] ?? null]);
                    $t->save();
                }
            }
            // Schedule
            $prefs = UserPref::firstOrCreate(['user_id'=>$uid], [
                'preferred_days'=>["Mon"=>["19:00-22:00"],"Wed"=>["19:00-22:00"],"Fri"=>["19:00-22:00"]],
                'pomodoro_minutes'=>45, 'break_minutes'=>10, 'max_daily_focus_blocks'=>4
            ]);
            $tasks2 = PlannerTask::where('user_id',$uid)->get()->filter(fn($t)=> isset($t->priority_components['p_final']));
            $free = FreeSlots::nextWeek($prefs->preferred_days ?? [], 7);
            $payloadSchedule = [
                "timezone"=>"Asia/Jakarta",
                "free_slots"=>$free,
                "tasks"=>$tasks2->map(function($t){
                    return [
                        "id"=>$t->id,
                        "p_final"=>$t->priority_components['p_final'] ?? 0,
                        "due_at"=>$t->due_at? $t->due_at->toIso8601String(): null,
                        "effort_hours"=>$t->estimated_effort_hours
                    ];
                })->values()->toArray(),
                "chunk_minutes"=>$prefs->pomodoro_minutes ?? 45,
                "break_minutes"=>$prefs->break_minutes ?? 10,
                "max_blocks_per_day"=>$prefs->max_daily_focus_blocks ?? 4
            ];
            $result = $ai->schedule($payloadSchedule);
            Log::channel('planner')->info('Auto replan', ['user_id'=>$uid, 'blocks'=>count($result['plan'] ?? [])]);
        }
        $this->info('Replan done');
    }
}
