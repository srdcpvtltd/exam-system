<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['name','course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
