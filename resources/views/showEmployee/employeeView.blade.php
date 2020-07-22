@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
      <a href="{{route('employee.create')}}" class="btn btn-primary mt-5 float-right">Create</a>
      <table class="table table-borderless" id="employee" class="display" cellspacing="0">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Department</th>
          <th>Position</th>
          <th>Start Date</th>
          {{-- <th>Action</th> --}}
        </tr>
        @foreach ($users as $user)
          <tbody id="myTable">
            <tr data-id="{{ $user->id }}">
              <td>{{$user->firstName}}</td>
              <td>{{$user->lastName}}</td>
              <td>{{$user->department->department}}</td> 
              <td>{{$user->position->position}}</td> 
              <td>{{$user->startDate}}</td>
              <td>
                <a href=""><i class="material-icons" style="color:red;">mode_delete</i></a>
                <a href="{{route('employee.edit' , $user->id)}}" data-toggle="modal" data-target="#Edit" data-placement="right" title="edit!" data-placement="left"
                  data-id={{$user->id}}  
                  data-firstName={{$user->firstName}}
                  data-lastName={{$user->lastName}}
                  data-department_id={{$user->department_id}} 
                  data-position_id={{$user->position_id}} 
                  data-startDate={{$user->startDate}}
                  data-profile={{$user->profile}}>
                <i class="material-icons">mode_edit</i></a>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
      <!-- Modal edit employee -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 20px; width: 350px; margin:0 auto;">
      <div class="modal-body">
        <h3>Edit employee</h3>
        <form method="POST" action="{{route('employee.update', $user->id)}}" id="modalEdit" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <input id="firstName" value="{{$user->firstName}}" type="text" class="form-control" placeholder="Firstname" name="firstName" required autocomplete="firstName">
              </div>
              <div class="form-group">
                <input id="lastName" value="{{$user->lastName}}" type="text" class="form-control" placeholder="LastName" name="lastName" required autocomplete="lastName">
              </div>
              <div class="form-group">
                <select class="form-control" name="department">
                  <option selected disabled>Department</option>
                 @foreach($department as $departments)
                    <option value="{{$departments->id}}" {{ ($user->department_id == $departments->id) ? 'selected' : '' }}>{{$departments->department}}</option> 
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="position">
                  <option selected disabled>Position</option>
                 @foreach($position as $positions)
                 <option value="{{$positions->id}}" {{ ($user->position_id == $positions->id) ? 'selected' : '' }}>{{$positions->position}}</option> 
                  @endforeach
              </select>
              </div>
              <div class="form-group">
                <input type="date" data-date="" value="{{$user->startDate}}" data-date-format="DD MMMM YYYY" class="form-control" id="startDate" name="startDate">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <img class="card-img-top mb-2" style="width: 80px;height:80px" class="mx-auto d-block" src="{{asset('img/'.$user->profile)}}"/>
              </div>
              <div class="form-group">
                <label for="picture" style="cursor: pointer"><i class="material-icons">add</i></label>
                <input type="file" id="picture" name="image" autocomplete="picture" style="display:none">
                <label for="editProfile" style="cursor: pointer"><i class="material-icons">edit</i></label>
                <input type="file" id="editProfile" name="image" autocomplete="editProfile" style="display:none">
                <label for="deleteProfile" style="cursor: pointer"><i class="material-icons">delete</i></label>
                <input type="file" id="deleteProfile" name="image" autocomplete="deleteProfile" style="display:none">
              </div>
            </div>
          </div>
          <div class="form-group">
          <a href="" data-dismiss="modal" style="margin-left:50%" class=" text-dark font-weight-bold">DISCARD</a>&nbsp;
           <button type="submit" class="btn text-warning btn-link">UPDATE</button>
          <div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--End Modal -->
    </div>
</div>
@endsection
