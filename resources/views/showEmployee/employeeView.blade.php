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
            <tr>
              <td class="action">{{$user->firstName}}</td>
              <td class="action">{{$user->lastName}}</td>
              <td class="action">{{$user->departments->department}}</td> 
              <td class="action">{{$user->positions->position}}</td> 
              <td class="action">{{$user->startDate}}</td>
              <td>
                <a href=""><i class="material-icons" style="color:red;">mode_delete</i></a>
                <a href="{{route('employee.edit', $user->id)}}" data-toggle="modal" data-target="#updateEmployee"><i class="material-icons">mode_edit</i></a>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
    </div>
</div>
{{-- Edit employee popup --}}
@include('showEmployee.edit')
@endsection
