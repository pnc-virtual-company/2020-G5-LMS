<?php

namespace App\Http\Controllers;
use App\Leave;
use App\User;
use Illuminate\Http\Request;
<<<<<<< HEAD:app/Http/Controllers/leaveController.php
=======

class leaveRequesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = Leave::all();
        $user = User::all();
        return view('showLeave.leaveRequest' ,compact('leave'));
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
>>>>>>> e9aed7c557b92efaba00a4a7524aa32bf95c789a:app/Http/Controllers/leaveRequesController.php

class LeaveController extends Controller
{
    public function index(){
        return view('pages.leave.allLeave');
    }
}
