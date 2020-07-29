<?php

namespace App\Http\Controllers;
use App\LeaveRequest;
use App\User;
use Illuminate\Http\Request;
use Auth;

class leaveRequesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = LeaveRequest::all();
        $user = User::all(); // select all users
        $log = Auth::user()->id; // get the user id of login 
        $auth = Auth::user()->role; //get the role of user login
            return view('showLeave.leaveRequest' ,compact('leave','auth','log'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function accepted($id)
    {
       $leaveRequest = LeaveRequest::find($id);
       $leaveRequest->status = 4;
       $leaveRequest->save();
       return back();
    }

    public function rejected($id)
    {
       $leaveRequest = LeaveRequest::find($id);
       $leaveRequest->status = 3;
       $leaveRequest->save();
       return back();
    }

}
