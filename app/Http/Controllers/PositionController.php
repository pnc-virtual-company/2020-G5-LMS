<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\User;
class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('pages.position.showPosition',compact('positions'));
    }

    
    public function addPosition(Request $request)
    {
            $positions = new Position;
            $positions->position = $request->get('position');
            $positions->save();
            return redirect('showPosition');
    }

    public function editPosition(Request $request,$id)
    {
            $positions = Position::find($id);
            $positions->position = $request->get('position');
            $positions->save();
            return redirect('showPosition');
    }

    public function deletePosition($id)
    {
            $positions = Position::find($id);
            $positions->delete();
            return redirect('showPosition');
    }
}
