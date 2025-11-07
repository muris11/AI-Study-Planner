<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudyReminder extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $title, public string $start, public string $end) {}

    public function build()
    {
        return $this->subject("Mulai blok belajar: {$this->title}")
            ->view('emails.study_reminder');
    }
}
