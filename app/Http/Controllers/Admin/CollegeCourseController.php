<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeCourse;
use Illuminate\Http\Request;

class CollegeCourseController extends Controller
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
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeCourse $collegeCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(CollegeCourse $collegeCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collegeCourse = CollegeCourse::find($id);
        $collegeCourse->update($request->all());
        toastr()->success('College Course Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollegeCourse $collegeCourse)
    {
        //
    }
}
