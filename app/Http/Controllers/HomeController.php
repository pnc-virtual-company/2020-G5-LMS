<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
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
    
    public function destroy($id)
    {
        $leaves = Leave::find($id);
        $leaves ->delete();
       return redirect('/home');
    }
}
