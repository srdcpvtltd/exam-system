<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'semester_id',
        'subject_id',
        'term',
        'type',
        'attendance_required',
        'is_back_paper',
        'date',
        'form_start_date',
        'form_last_date',
        'form_fee',
        'late_fee',
    ];
    protected $casts = [
        'date' => 'date',
        'form_start_date' => 'date',
        'form_last_date' => 'date',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
