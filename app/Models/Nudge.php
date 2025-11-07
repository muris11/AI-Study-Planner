<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nudge extends Model
{
    protected $fillable = [
        'user_id',
        'channel',
        'schedule_at',
        'message',
        'status',
        'sent_at',
        'error_message'
    ];

    protected $casts = [
        'schedule_at' => 'datetime',
        'sent_at' => 'datetime'
    ];
}
