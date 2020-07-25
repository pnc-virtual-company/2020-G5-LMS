<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Department;
use App\Position;
use Laravel\Ui\Presets\React;

class employeeViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $depart = Department::all();
        $position = Position::all();
        return view('showEmployee.employeeView',compact(['user','depart','position']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    function editEmployee(){
       
        return view('showEmployee.employeeView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user =  User::find(Auth::id());
         $user =  new User;
         $user->firstName = $request->get('first');
         $user->lastName = $request->get('last');
         $user->startDate = $request->get('date');
         $user->email = $request->get('email');
         $user->role = $request->get('role');
         $user->password = bcrypt($request->get('new_password'));
         $user->department_id = $request->get('depart');
         $user->position_id = $request->get('position');
         if($user->manager = $request->get('manager') != null){
            $user->manager = $request->get('manager');
         }else{
             $user->manager = "  ";
         }
         $user->save();
         return redirect('employee');
    }
    // public function addEmployee(Request $request){
       
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }
    
}
