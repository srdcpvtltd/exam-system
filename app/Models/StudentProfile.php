<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'college_id',
        'course_id',
        'semester_id',
        'enrollment_year',
        'roll_number',
        'phone',
        'alternative_phone',
        'fathers_name',
        'mother_name',
        'blood_group',
        'date_of_birth',
        'first_name',
        'middle_name',
        'last_name',
        'guardian_first_name',
        'guardian_middle_name',
        'guardian_last_name',
        'mother_first_name',
        'mother_middle_name',
        'mother_last_name',
        'father_first_name',
        'father_middle_name',
        'father_last_name',
        'day',
        'month',
        'year',
        'aadhar_no',
        'security_question',
        'gender',
        'nationality',
        'caste',
        'persons_with_disability',
        'ex_service_man',
        'religion',
        'other_nationality_1',
        'other_nationality_2',
        'mother_tongue',
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function college()
    {
        return $this->belongsTo(User::class,'college_id');
    }
}
