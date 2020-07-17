@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <a href="{{route('employee.create')}}" class="btn btn-primary mt-5 float-right">Create</a>
       <table class="table table-border" id="employee" class="display" cellspacing="0">
               <tr>
                   <th>Firstname</th>
                   <th>Lastname</th>
                   <th>Department</th>
                   <th>Position</th>
                   <th>Start Date</th>
                   <th>Action</th>
                 </th>
              @foreach ($user as $users)
              <tbody id="myTable">
               <tr>
                   <td>{{$users->firstName}}</td>
                   <td>{{$users->lastName}}</td>
                   <td>{{$users->departments->department}}</td> 
                   <td>{{$users->positions->position}}</td> 
                   <td>{{$users->startDate}}</td>
                   <td>
                    <a onclick="document.getElementById('{{'user_id'.$users->id}}').submit()" href="#">delete</i></a><br>
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
@endsection