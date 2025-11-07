<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyBlock extends Model
{
    protected $fillable = ['user_id','task_id','start_at','end_at','status','actual_minutes'];
    protected $casts = ['start_at'=>'datetime','end_at'=>'datetime'];

    public function task()
    {
        return $this->belongsTo(PlannerTask::class, 'task_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
