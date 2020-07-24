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
          <a href="{{route('employee.create')}}" class="btn btn-warning text-light mt-5 float-right">+Create</a>
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
                   <td class="action" >{{$users->startDate}}</td>  
                   <td class="action_hidden">
                    <a href="#"><i class="material-icons text-success">edite</i></a>
                    <a href="" data-toggle="modal"  data-target="#deleteEmployee{{$users->id}}"><i  class="material-icons text-danger">delete</i></a>
                   </td>
                    
                 </tr>
              </tbody>
            @endforeach
         </table>
    </div>
</div>
<!-- Start model delete employee -->
<div class="modal" id="deleteEmployee{{$users->id}}">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
      <!-- Modal body -->
      <div class="modal-body">
          <form action="{{route('employee.destroy',$users->id)}}" method="POST">
              @csrf
              @method('DELETE')
            <div class="from-group">
              <h2>Remove items ?</h2>
              <p>Are you sure you want to remove the selected employee?</p>
              <button type="submit" class="btn text-warning float-right">REMOVE</button>
              <button type="button" class="btn float-right" data-dismiss="modal">DON'T REMOVE</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End modal delete employee -->
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



 