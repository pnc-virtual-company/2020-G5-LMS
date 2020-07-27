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
      {{-- <a href="{{route('employee.create')}}" class="btn btn-primary mt-5 float-right">Create</a> --}}
      <table class="table table-borderless" id="employee" class="display" cellspacing="0">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Department</th>
          <th>Position</th>
          <th>Manager</th>
          <th>Start Date</th>
          {{-- <th>Action</th> --}}
        </tr>
        @foreach ($users as $user)
          <tbody id="myTable">
            <tr data-id="{{ $user->id }}">
              <td class="action">{{$user->firstName}}</td>
              <td class="action">{{$user->lastName}}</td>
              <td class="action">{{$user->department->department}}</td> 
              <td class="action">{{$user->position->position}}</td>
              <td class="action">{{$user->referral}}</td>
              <td class="action">{{$user->startDate}}</td>
              <td class="action_hidden">
                <a href="#"> <i class="material-icons">mode_delete</i></a></a>
                <a href="#" data-toggle="modal" data-target="#editEmployee" data-placement="right" title="edit!" data-placement="left"
                  data-id={{$user->id}}  
                  data-firstname={{$user->firstName}}
                  data-lastname={{$user->lastName}}
                  data-departmentid={{$user->department_id}} 
                  data-positionid={{$user->position_id}}
                  data-startdate={{$user->startDate}}
                  data-profile={{$user->profile}}>
                <i class="material-icons">mode_edit</i></a>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
    </div> 
</div>
<!-- Modal edit employee -->
<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
      <div class="modal-body">
        <h3>Edit employee</h3>
        <form method="POST"  id="modalEdit" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <input id="firstName"  type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
              </div>
              <div class="form-group">
                <input id="lastName"  type="text" class="form-control" placeholder="LastName" name="lastName" required autocomplete="lastName">
              </div>
              <div class="form-group">
                <select class="form-control" id="deparment" name="department">
                  <option selected disabled>Department</option>
                 @foreach($department as $departments)
                    <option value="{{$departments->id}}" {{ ($user->department_id == $departments->id) ? 'selected' : '' }}>{{$departments->department}}</option> 
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <select class="form-control" id="position" name="position">
                  <option selected disabled>Position</option>
                 @foreach($position as $positions)
                 <option value="{{$positions->id}}" {{ ($user->position_id == $positions->id) ? 'selected' : '' }}>{{$positions->position}}</option> 
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <select name="manager" class="form-control">
                  <option value="">Manager</option>
                   @foreach ($users as $user)
                     @if ($user->role == 2)
                     <option value="{{$user->id}}">{{$user->firstName}}</option>
                     <option value="{{$user->id}}" {{ ($user->id == $user->manager) ? 'selected' : '' }}>{{$user->firstName}}</option> 
                     @endif  
                   @endforeach
                </select>
             </div>
              <div class="form-group">
                <input id="startdate" type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control" id="startDate" name="startDate">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">

                <img class="card-img-top mb-2" style="width: 80px;height:80px" class="mx-auto d-block" id="showProfile"/>
              
              </div>
              <div class="form-group">
                <label for="picture" style="cursor: pointer"><i class="material-icons">add</i></label>
                <input type="file" id="picture" name="image" autocomplete="picture" style="display:none">
                <label for="editProfile" style="cursor: pointer"><i class="material-icons">edit</i></label>
                <input type="file" id="editProfile" name="editProfile" autocomplete="editProfile" style="display:none">
                <a style="color: black" id="deleteProfile" onclick="return confirm('Are you sure you want to delete this item')"><i class="material-icons">delete</i></a>
              </div>
            </div>
          </div>
          <div class="form-group">
          <a href="#" data-dismiss="modal" style="margin-left:50%" class=" text-dark font-weight-bold">DISCARD</a>&nbsp;
           <button type="submit" class="btn text-warning btn-link">UPDATE</button>
          <div>
        </form>
      </div>
    
    </div>
  </div>
</div>
<!--End Modal -->
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
               <div class="form-group">
                ​​<select name="depart" class="form-control" required>
                  <option value="">--Department--</option>
                   @foreach ($department as $departments)
                   <option value="{{$departments->id}}">{{$departments->department}}</option>
                   @endforeach
              </select>
               </div>
              </div>
              ​<div class="col-6">
                <div class="form-group">
                  <input type="date" name="date" class="form-control" required>
                </div>
              </div>
               <div class="col-6">
                <div class="form-group">
                   <select name="manager" class="form-control">
                     <option value="">--Manager--</option>
                      @foreach ($users as $user)
                        @if ($user->role == 2)
                        <option value="{{$user->firstName}}">{{$user->firstName}}</option>
                        @endif  
                      @endforeach
                   </select>
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
                    <option>role</option>
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