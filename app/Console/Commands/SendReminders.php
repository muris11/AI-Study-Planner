<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendNudges;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send queued study reminders via email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sending queued study reminders...');

        // Dispatch the SendNudges job
        SendNudges::dispatch();

        $this->info('Reminder job dispatched successfully!');
        $this->comment('Reminders will be sent to users whose study blocks are starting soon.');
    }
}
