<?php

namespace App\Http\Controllers\Prospect;

use App\Http\Controllers\Controller;
use App\Models\StudentAcademicQualification;
use Exception;
use Illuminate\Http\Request;

class StudentAcademicQualificationController extends Controller
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
        try{
            StudentAcademicQualification::create($request->all());
            toastr()->success('Student Academic Qualification Added Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAcademicQualification  $studentAcademicQualification
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAcademicQualification $studentAcademicQualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAcademicQualification  $studentAcademicQualification
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAcademicQualification $studentAcademicQualification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAcademicQualification  $studentAcademicQualification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $studentAcademicQualification = StudentAcademicQualification::find($id);
        $studentAcademicQualification->update($request->all());
        toastr()->success('Student Academic Qualification Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAcademicQualification  $studentAcademicQualification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentAcademicQualification = StudentAcademicQualification::find($id);
        $studentAcademicQualification->delete();
        toastr()->success('Student Academic Qualification Deleted successfully');
        return redirect()->back();
    }
}
