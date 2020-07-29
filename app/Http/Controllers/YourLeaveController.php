<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YourLeaveController extends Controller
{
    public function index(){
        return view('pages.yourLeave.yourLeave');
    }
}
