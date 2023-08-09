<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $studentProfile = StudentProfile::find($id);
        $studentProfile->update($request->all());
        toastr()->success('Student Profile Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
}
