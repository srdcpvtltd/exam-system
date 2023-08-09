<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EntranceFee;
use Exception;
use Illuminate\Http\Request;

class EntranceFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.entrance_fee.index');
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
                'exam_name' => 'required',
                'exam_fee' => 'required',
            ]);
            EntranceFee::create($request->all());
            toastr()->success('Entrance Fee Added Successfully');
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
     * @param  \App\Models\EntranceFee  $entranceFee
     * @return \Illuminate\Http\Response
     */
    public function show(EntranceFee $entranceFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EntranceFee  $entranceFee
     * @return \Illuminate\Http\Response
     */
    public function edit(EntranceFee $entranceFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EntranceFee  $entranceFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $entranceFee = EntranceFee::find($id);
        $entranceFee->update($request->all());
        toastr()->success('Entrance Fee Updated successfully');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EntranceFee  $entranceFee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entranceFee = EntranceFee::find($id);
        $entranceFee->delete();
        toastr()->success('Entrance Fee Deleted successfully');
        return redirect()->back();
    }
}
