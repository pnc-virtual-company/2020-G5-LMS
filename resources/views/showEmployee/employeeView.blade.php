@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
       
  <div class="container">
    <div class="col-12">
      <div class="row">
        <div class="col-6">
            <h2>Employee</h2>
      </div>
        <div class="col-6">
          <a href="{{route('editEmployee')}}" class="btn btn-warning text-light mt-5 float-right" data-toggle="modal" data-target="#myModal">+Create</a>
        </div>
    </div>
        
       <table class="table table-borderless" id="employee" class="display" cellspacing="0">
                <tr>
                   <th>Firstname</th>
                   <th>Lastname</th>
                   <th>Department</th>
                   <th>Position</th>
                   <th>Start Date</th>
                </tr>
              @foreach ($user as $users)
              <tbody id="myTable">
               <tr >
                   <td class="action">{{$users->firstName}}</td>
                   <td class="action">{{$users->lastName}}</td>
                   <td class="action">{{$users->departments->department}}</td>
                   <td class="action">{{$users->positions->position}}</td> 
                   <td class="action">{{$users->startDate}}</td>  
                   <td class="action_hidden">
                    <a onclick="document.getElementById('{{'user_id'.$users->id}}').submit()" href="#"><i class="material-icons text-danger">delete</i></a>
                    <form id="{{'user_id'.$users->id}}" action="{{route('employee.destroy',$users->id)}}" method="post">
                      @csrf
                      @method('delete')
                    </form>
                   </td>
                 </tr>
              </tbody>
        
            @endforeach
         </table>
    </div>
</div>
              <!-- The Modal add employee -->
  <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 20px;">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add employee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
           <div class="contianer">
             <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input type="text" name="first" placeholder="Firstname" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input type="text" name="last" placeholder="Lastname" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input type="email" name="email" placeholder="email" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input type="password" name="password" placeholder="password" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                ​​<select name="depart" class="form-control" required>
                  <option value="">--Department--</option>
                   @foreach ($depart as $departs)
                   <option value="{{$departs->id}}">{{$departs->department}}</option>
                   @endforeach
              </select>
              </div>
              ​<div class="col-6">
                <div class="form-group">
                  <input type="date" name="date" class="form-control" required>
                </div>
              </div>
               <div class="col-6">
                <div class="form-group">
                  ​<input type="file" name="profile" class="form-control" required autocomplete="profile" required>
                </div>
               </div>
               <div class="col-6">
                <div class="form-group">
                  <select name="position" class="form-control" required>
                    <option value="">--Position--</option>
                    @foreach ($position as $positions)
                    <option value="{{$positions->id}}">{{$positions->position}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                <div class="col-6">
                  <div class="form-group">
                    <select name="role" class="form-control" required>
                    <option value="">role</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                   </select>
                </div>
                </div>
               <button type="button" class="btn float-right">DISCARD</button>
              <button type="submit" class="btn TEXT-warning ">CREATE</button>
             </div>
           </div>
        </form>
      </div>
    </div>
  </div>
 </div>
</body>
</html>
@endsection
<style>
  .action_hidden{
    display: none;
  }
  .action:hover + .action_hidden{
  display: block;
  }
</style>



 