<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\User;
use DB;
class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('pages.position.showPosition',compact('positions'));
    }

    
    public function addPosition(Request $request)
    {
       
        $positions = new Position;
        $request -> validate([
            'position' => 'required|unique:positions,position',
        ]);
        $positions->position = $request->get('position');
        $positions->save();
        return redirect('showPosition');
    }

    /**
     * Get date to compair if it's already has in datebase
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function existPosition(Request $request) {
        $position = $request->get('result');
        if($request->ajax()){
            $positionData = DB::table('positions')->where('position',$position)->get();
            return $positionData;
        }
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
