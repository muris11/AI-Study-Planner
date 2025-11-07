<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlannerTask extends Model
{
    protected $fillable = [
        'user_id','course_id','title','type','due_at','weight_pct','difficulty',
        'competency_self','estimated_effort_hours','priority_components','status'
    ];
    protected $casts = ['priority_components'=>'array','due_at'=>'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blocks()
    {
        return $this->hasMany(StudyBlock::class, 'task_id');
    }
}
