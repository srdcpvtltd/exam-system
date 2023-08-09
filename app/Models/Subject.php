<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name','course_id','code','type','semester_id'];
    
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }
}
