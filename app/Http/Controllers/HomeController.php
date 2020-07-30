<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\LeaveRequest;
use App\Leave;
use App\User;
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
        $user = User::find(Auth::user()->id);
        $leaves = $user->leave_requests;
        return view('home',compact('leaves'));
    }

    public function addLeavesRequest(Request $request){
        $user = Auth::user()->id;
        $leavesRequest = new LeaveRequest;
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
        $leavesRequest = LeaveRequest::find($id);
        $leavesRequest->startDate = $request->startDate;
        $leavesRequest->endDate = $request->endDate;
        $leavesRequest->duration = $request->duration;
        $leavesRequest->comment = $request->comment;
        $leavesRequest->types = $request->type;
        $leavesRequest->user_id = $user;
        $leavesRequest->save();
        return redirect('/home');
    }

    public function addProfile(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('img/', $filename);
            $user->profile = $filename;
        }
        if ($request->hasfile('newPicture')){
            $file = $request->file('newPicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('img/', $filename);
            $user->profile = $filename;
        }
        $user->save();
        return back();
    }
        public function deleteProfile($id)
        {
            $user = User::find($id);
            $user->profile = "profile.png";
            $user->save();
            return back();
        }

        public function destroy($id){
            $leavesRequest = LeaveRequest::find($id);
            $leavesRequest->delete();
            return redirect('/home');
        }
    }

    


