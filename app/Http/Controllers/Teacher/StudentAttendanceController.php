<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\StudentAttendance;
use App\Models\StudentProfile;
use Exception;
use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.student_attendance.index');
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
        foreach($request->attended_days  as $key => $attended_day)
        {
            StudentAttendance::create(['attended_days' => $attended_day,'student_id' => $request->student_id[$key]]+ $request->all());
        }
        toastr()->success('Student Attendance Added Successfully');
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $studentAttendance)
    {
        //
    }
    public function getStudents(Request $request)
    {
        try{
            
            $this->validate($request,[
                'college_id' => 'required',
                'teacher_id' => 'required',
                'course_id' => 'required',
                'semester_id' => 'required',
                'month' => 'required',
                'total_days' => 'required',
                'subject_id' => 'required',
            ]);
            $alreadyHaveAttendances = StudentAttendance::where('month',$request->month)->where('subject_id',$request->subject_id)->get();
            if($alreadyHaveAttendances->count() > 0)
            {
                return response([
                    'message' => "Already have Attendance for this month and subject",
                ], 200);
            }
            $studentProfiles = StudentProfile::where('college_id',$request->college_id)
                ->where('course_id',$request->course_id)->where('semester_id',$request->semester_id)->get();
            if($studentProfiles->count() > 0)
            {
                $html = view('college.student_attendance.partials.students', compact('studentProfiles'))->render();
                return response([
                    'html' => $html,
                ], 200);
            }else{
                return response([
                    'message' => "No Student Found",
                ], 200);
            }
        }catch (Exception $e)
        {
            return response([
                'message' => $e->getMessage(),
            ], 200);

        }
    }
}
