<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = User::where('role_id',5)->get();
        return view('admin.prospect.index',compact('prospects'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prospect = User::find($id);
        $active_tab = 'registration';
        return view('admin.prospect.show',compact('prospect','active_tab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prospect = User::find($id);
        return view('admin.prospect.edit',compact('prospect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        toastr()->success('Prospect Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function statusUpdate(Request $request)
    {
        $user = User::find($request->user_id);
        if($request->status == "Admitted")
        {
            $user->update([
                'role_id' => 3
            ]);
            toastr()->success('Prospect Updated to Student successfully');
        }elseif($request->status == "Rejected")
        {
            $user->delete();
            toastr()->success('Prospect Application Deleted successfully');
        }else{
            toastr()->error('Something Went Wrong');
        }
        return redirect()->back(); 
    }
}
