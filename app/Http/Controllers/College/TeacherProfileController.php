<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use App\Models\TeacherProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = TeacherProfile::where('college_id',Auth::user()->id)->get();
        return view('college.teacher.index',compact('teachers'));
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
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacherProfile = TeacherProfile::find($id);
        $teacher = $teacherProfile->teacher;
        return view('college.teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherProfile $teacherProfile)
    {
        //
    }
}
