<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPref extends Model
{
    protected $fillable = ['user_id','preferred_days','pomodoro_minutes','break_minutes','max_daily_focus_blocks','mute_hours'];
    protected $casts = ['preferred_days'=>'array'];
}
