<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'college_profile_id',
        'seats',
        'course_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function collegeProfile(){
        return $this->belongsTo(CollegeProfile::class,'college_profile_id');
    }
}
