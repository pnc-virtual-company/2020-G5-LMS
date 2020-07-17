@extends('layouts.app')
@section('content')
       <div class="container">
           <div class="col-12">
            <table class="table table mt-5">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Duration</th>
                        <th>Type</th>
                    </tr>
                </thead>
                  @foreach ($leave as $leaves)
                  <tbody id="myTable">
                    <tr>
                        <td>{{$leaves->user->firstName." "}}{{" ".$leaves->user->lastName}}</td>
                        <td>{{$leaves->startDate}}</td>
                        <td>{{$leaves->endDate}}</td>
                        <td>{{$leaves->duration}}</td>
                        <td>{{$leaves->types}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Accept</a>
                            <a href="#" class="btn btn-danger">Reject</a>
                        </td>
                       </tr>
                  </tbody>
                  @endforeach
            </table>
           </div>
       </div>
       <script>
</script>
@endsection