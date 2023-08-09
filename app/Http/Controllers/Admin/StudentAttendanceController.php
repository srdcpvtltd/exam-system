<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.student_attendance.index');
        //
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
                'course_id' => 'required',
                'semester_id' => 'required',
            ]);
            $studentAttendances = StudentAttendance::where('college_id',$request->college_id)
            ->where('course_id',$request->course_id)->where('semester_id',$request->semester_id)->get()->groupby('student_id');
            if($studentAttendances->count() > 0)
            {
                $html = view('admin.student_attendance.partials.students', compact('studentAttendances'))->render();
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
    public function forceAllowed(Request $request)
    {
        try{
            $this->validate($request,[
                'course_id' => 'required',
                'semester_id' => 'required',
                'student_id' => 'required'
            ]);
            
            $studentAttendances = StudentAttendance::where('student_id',$request->student_id)
            ->where('course_id',$request->course_id)->where('semester_id',$request->semester_id)->get();
            foreach($studentAttendances as $studentAttendance)
            {
                $studentAttendance->update([
                    'forced_allow_exam' => true
                ]);
            }
            return response([
                'success' => true,
            ], 200);
        }catch (Exception $e)
        {
            return response([
                'message' => $e->getMessage(),
            ], 200);

        }
    }
}
