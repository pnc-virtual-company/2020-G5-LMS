<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('pages.position.showPosition',compact('positions'));
    }
}
