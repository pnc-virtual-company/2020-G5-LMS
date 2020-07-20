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
              <h2>Employees</h2>
          </div>
          <div class="col-6">
           
            <a href="{{route('employee.create')}}"><button class="btn btn-warning float-right text-white">+Create</button></a>
          </div>
        </div><br>
        <table class="table table-borderless" id="employee" class="display" cellspacing="0">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Manager</th>
                    <th>Start Date</th>

                </tr>
                @foreach ($user as $users)
                <tbody id="myTable">
                <tr>
                    <td>{{$users->firstName}}</td>
                    <td>{{$users->lastName}}</td>
                    <td>{{$users->departments->department}}</td> 
                    <td>{{$users->positions->position}}</td>
                    <td>
                      {{$users->firstName}}
                    </td> 
                    <td>{{$users->startDate}}</td>
                  </tr>
                </tbody>
              @endforeach
          </table>
      </div>
  </div>
</body>
</html>
@endsection