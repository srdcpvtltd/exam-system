<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::where('course_id',Auth::user()->studentProfile->course_id)
        ->where('semester_id',Auth::user()->studentProfile->semester_id)
        ->whereDate('form_start_date','<=',date('Y-m-d'))
        ->whereDate('form_last_date','>=',date('Y-m-d'))
        ->get();
        $allExams = [];
        $studentAttendances = StudentAttendance::where('student_id',Auth::user()->id)
        ->where('course_id',Auth::user()->studentProfile->course_id)->where('semester_id',Auth::user()->studentProfile->semester_id)->get()->groupby('student_id');
        if(count($studentAttendances) > 0)
        {
            $studentAttendance = $studentAttendances->first();
            if(count($studentAttendance) > 0)
            {
                $totalPercentage = round($studentAttendance->sum('attended_days') / $studentAttendance->sum('total_days') * 100, 2);
                $isAllowed = $studentAttendance->first()->forced_allow_exam;
                foreach($exams as $exam)
                {
                    if($totalPercentage >= $exam->attendance_required || $isAllowed)
                    {
                        $allExams[] = $exam;
                    }
                }
    
            }

        }
        return view('student.exam.index',compact('allExams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
