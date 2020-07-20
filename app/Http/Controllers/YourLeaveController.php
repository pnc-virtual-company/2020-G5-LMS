<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\User;

class YourLeaveController extends Controller
{
    public function index(){
        $leaves = Leave::all();
        return view('pages.yourLeave.yourLeave',compact('leaves'));
    }
}