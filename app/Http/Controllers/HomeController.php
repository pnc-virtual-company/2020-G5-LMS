<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\User;
use App\leaveRequest;
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
        $leaves = leaveRequest::all();
        return view('home',compact('leaves'));
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


}
