
@extends('layouts.app')
@section('content')
       <div class="container">
           <div class="col-12">
            @if ($auth != 4)   
            <h3>Leave request submit to me</h3>
            <table class="table table-borderless mt-3">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Duration</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @if ($auth != 3)
                    @foreach ($leave as $leaves)
                        <tr>
                            <td>{{$leaves->user->firstName." "}}{{" ".$leaves->user->lastName}}</td>
                            <td>{{$leaves->startDate}}</td>
                            <td>{{$leaves->endDate}}</td>
                            <td>{{$leaves->duration}}</td>
                            <td>{{$leaves->types}}</td>
                            <td>
                                <a id="accected" data-id="{{$leaves->id}}" href="{{route('accepted', $leaves->id)}}" class="btn btn-primary">Accept</a>
                                <a id="rejected" data-id="{{$leaves->id}}" href="{{route('rejected', $leaves->id)}}" class="btn btn-white" style="border: 1px solid">Reject</a>
                            </td>
                           </tr>
                           <script>
                               document.getElementById('accected').addEventListener("click", test);
                                function test(){
                                    console.log("hello");
                                }
                           </script>
                       @endforeach
                       @else
                       @foreach ($leave as $leaves)
                       
                       @if ($log == $leaves->user->manager_id)
                       <tr>
                        <td>{{$leaves->user->firstName." "}}{{" ".$leaves->user->lastName}}</td>
                        <td>{{$leaves->startDate}}</td>
                        <td>{{$leaves->endDate}}</td>
                        <td>{{$leaves->duration}}</td>
                        <td>{{$leaves->types}}</td>
                        <td>
                            <a id="accected" data-id="{{$leaves->id}}"  href="{{route('accepted', $leaves->id)}}" class="btn btn-primary">Accept</a>
                            <a id="rejected" data-id="{{$leaves->id}}" href="{{route('rejected', $leaves->id)}}" class="btn btn-white" style="border: 1px solid">Reject</a>
                        </td>
                       </tr>
                       @endif
                       @endforeach
                       @endif
                  </tbody>
            </table>
            @else
                
            @endif
           </div>
       </div>
       <script>
</script>
@endsection