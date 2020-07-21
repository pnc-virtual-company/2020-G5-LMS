<?php

namespace App\Http\Controllers;
use\App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view('pages.department.showDepartment');
    }

    public function showDepartment(){
        $departments = Department::all();
        return view('showEmployee.employeeView',compact('departments'));
    }
}
