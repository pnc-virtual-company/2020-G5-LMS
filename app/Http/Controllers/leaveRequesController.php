<?php

namespace App\Http\Controllers;
use App\Leave;
use App\User;
use Illuminate\Http\Request;

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

}
