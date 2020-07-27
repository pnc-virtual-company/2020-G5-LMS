<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $leaves = Leave::all();
        return view('home',compact('leaves'));
    }
 
    public function addLeavesRequest(Request $request){
        $user = Auth::user()->id;
        $leavesRequest = new Leave;
        $leavesRequest->startDate = $request->startDate;
        $leavesRequest->endDate = $request->endDate;
        $leavesRequest->duration = $request->duration;
        if($request->comment != ''){
            $leavesRequest->comment = $request->comment;
        }
        $leavesRequest->types = $request->type;
        $leavesRequest->user_id = $user;
        $leavesRequest->save();
        return redirect('/home');
    }

    public function udateLeave(Request $request, $id){
        $user = Auth::user()->id;
        $leavesRequest = Leave::find($id);
        $leavesRequest->startDate = $request->startDate;
        $leavesRequest->endDate = $request->endDate;
        $leavesRequest->duration = $request->duration;
        $leavesRequest->comment = $request->comment;
        $leavesRequest->types = $request->type;
        $leavesRequest->user_id = $user;
        $leavesRequest->save();
        return redirect('/home');

    }

}
