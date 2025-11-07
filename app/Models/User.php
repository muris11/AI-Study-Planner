<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password_hash','role','timezone'];
    protected $hidden = ['password_hash'];

    public function tasks()
    {
        return $this->hasMany(PlannerTask::class);
    }

    public function blocks()
    {
        return $this->hasMany(StudyBlock::class);
    }
}
