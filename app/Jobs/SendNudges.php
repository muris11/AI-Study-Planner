<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Nudge;
use App\Models\User;
use App\Mail\StudyReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SendNudges implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $now = now('Asia/Jakarta');

        // Get pending nudges that are due
        $dueNudges = Nudge::where('status', 'pending')
            ->where('schedule_at', '<=', $now)
            ->get();

        foreach ($dueNudges as $nudge) {
            // Use database transaction for atomic operations
            DB::transaction(function () use ($nudge) {
                // Lock the nudge record to prevent concurrent processing
                $lockedNudge = Nudge::where('id', $nudge->id)
                    ->where('status', 'pending')
                    ->lockForUpdate()
                    ->first();

                if (!$lockedNudge) {
                    // Another job already processed this nudge
                    return;
                }

                // Mark as processing to prevent duplicate sends
                $lockedNudge->status = 'processing';
                $lockedNudge->save();

                $user = User::find($lockedNudge->user_id);
                if (!$user) {
                    Log::warning('User not found for nudge', ['nudge_id' => $lockedNudge->id, 'user_id' => $lockedNudge->user_id]);
                    $lockedNudge->status = 'failed';
                    $lockedNudge->save();
                    return;
                }

                $message = json_decode($lockedNudge->message, true) ?? [];

                if ($lockedNudge->channel === 'email') {
                    try {
                        Mail::to($user->email)->send(new StudyReminder(
                            $message['title'] ?? 'Belajar',
                            $message['start'] ?? '',
                            $message['end'] ?? ''
                        ));

                        // Mark as sent on success
                        $lockedNudge->status = 'sent';
                        $lockedNudge->sent_at = now();
                        $lockedNudge->save();

                        Log::info('Nudge email sent successfully', [
                            'nudge_id' => $lockedNudge->id,
                            'user_id' => $user->id,
                            'email' => $user->email
                        ]);

                    } catch (\Exception $e) {
                        // Mark as failed on error
                        $lockedNudge->status = 'failed';
                        $lockedNudge->error_message = $e->getMessage();
                        $lockedNudge->save();

                        Log::error('Failed to send nudge email', [
                            'nudge_id' => $lockedNudge->id,
                            'user_id' => $user->id,
                            'email' => $user->email,
                            'error' => $e->getMessage()
                        ]);

                        // Re-throw to mark job as failed for potential retry
                        throw $e;
                    }
                } else {
                    // Unsupported channel
                    $lockedNudge->status = 'failed';
                    $lockedNudge->error_message = 'Unsupported channel: ' . $lockedNudge->channel;
                    $lockedNudge->save();

                    Log::warning('Unsupported nudge channel', [
                        'nudge_id' => $lockedNudge->id,
                        'channel' => $lockedNudge->channel
                    ]);
                }
            });
        }
    }
}
