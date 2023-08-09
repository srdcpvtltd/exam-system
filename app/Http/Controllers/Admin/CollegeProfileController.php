<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CollegeProfileController extends Controller
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
     * @param  \App\Models\CollegeProfile  $collegeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeProfile $collegeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollegeProfile  $collegeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CollegeProfile $collegeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollegeProfile  $collegeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collegeProfile = CollegeProfile::find($id);
        $collegeProfile->update($request->all());
        toastr()->success('College Profile Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollegeProfile  $collegeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollegeProfile $collegeProfile)
    {
        //
    }
    
    public function downloadFile($id)
    {
        $profile = CollegeProfile::find($id);
        $files = public_path(). "$profile->document";
        return Response::download($files);
    }
}
