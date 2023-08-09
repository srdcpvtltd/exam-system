<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'course_id',
        'semester_id',
        'subject_id',
        'teacher_id',
        'student_id',
        'total_days',
        'attended_days',
        'month',
        'forced_allow_exam'
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    public function college()
    {
        return $this->belongsTo(User::class,'college_id');
    }
    public function course()
    {
        return $this->belongsTo(CollegeCourse::class,'course_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
}
