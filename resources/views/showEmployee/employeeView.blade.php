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
              @foreach ($depart as $departs)
              <tbody id="myTable">
               <tr>
                   <td>{{$departs->user->firstName}}</td>
                   <td>{{$departs->user->lastName}}</td>
                   <td>{{$departs->department}}</td>
                    @foreach ($position as $positions)
                    <td>{{$positions->position}}</td> 
                    @endforeach
                   <td>{{$departs->user->startDate}}</td>
                   <td></td>
                 </tr>
              </tbody>
            @endforeach
         </table>
    </div>
</div>
<script>

</script>
@endsection