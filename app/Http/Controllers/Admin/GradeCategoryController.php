<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\GradeCategory;
use Exception;
use Illuminate\Http\Request;

class GradeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.grade_category.index');
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
            $this->validate($request,[
                'name' => 'required',
            ]);
            GradeCategory::create($request->all());
            toastr()->success('Grade Category Added Successfully');
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
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GradeCategory $gradeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeCategory $gradeCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $gradeCategory = GradeCategory::find($id);
        $gradeCategory->update($request->all());
        toastr()->success('Grade Category Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradeCategory  $gradeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradeCategory = GradeCategory::find($id);
        $gradeCategory->delete();
        toastr()->success('Grade Category Deleted successfully');
        return redirect()->back();
    }
}