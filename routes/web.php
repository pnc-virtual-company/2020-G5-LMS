<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/showDepartment', 'DepartmentController@index')->name('showDepartment');

Route::get('/showPosition', 'PositionController@index')->name('showPosition');

Route::get('/showEmployee', 'EmployeeController@index')->name('showEmployee');

Route::get('/showLeave', 'LeaveController@index')->name('showLeave');

Route::get('/showYourLeave', 'YourLeaveController@index')->name('showYourLeave');
