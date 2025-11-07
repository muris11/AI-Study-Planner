<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\StudyReminder;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SendTestReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:reminder {user_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test study reminder email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->argument('user_id');

        if (!$userId) {
            $this->error('Please provide a user ID: php artisan test:reminder {user_id}');
            return;
        }

        $user = User::find($userId);

        if (!$user) {
            $this->error("User with ID {$userId} not found.");
            return;
        }

        $this->info("Sending test reminder to: {$user->email}");

        try {
            Mail::to($user->email)->send(new StudyReminder(
                'Test Blok Belajar - Matematika',
                '14:00',
                '14:45'
            ));

            $this->info('Test reminder email sent successfully!');
        } catch (\Exception $e) {
            $this->error('Failed to send email: ' . $e->getMessage());
        }
    }
}
