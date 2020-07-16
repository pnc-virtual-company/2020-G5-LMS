@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="container mt-5">
      <div class="col-12">
       
            <div class="rows">
                <div class="col-1"></div>
                <div class="col-10">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
                <div class="col-1"></div>
            </div>
        
          <div class="row">
              <div class="col-6">
                  <h2>Your leave requests</h2>
            </div>
              <div class="col-6">
                <a href="" class="" ><button class="btn btn-warning float-right text-white">Request a leave</button></a>
              </div>
          </div>
          
        <br>
        
            <table class="table table-bordered">
                <tr>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Duration</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>

                @foreach ($leaves as $leave)
                
                <tr>
                    
                    <td>{{$leave->startDate}}</td>
                    <td>{{$leave->endDate}}</td>
                    <td>{{$leave->duration}}</td>
                    <td>{{$leave->types}}</td>
                    <td>
                        @if ($leave -> status == 1)
                            <a href=""><button class="bnt btn-primary">Requested</button></a>
                        @endif  

                        @if($leave -> status == 2  )
                        <a href=""><button class="bnt btn-danger">Cancelled</button></a>
                        @endif  
                        @if($leave -> status == 3 )
                        <a href=""><button class="bnt btn-success">Rejected</button></a>
                        
                        @endif
                        @if($leave -> status == 4 )
                        <a href=""><button class="bnt btn-success">Accepted</button></a>
                        
                        @endif


                    </td>
                </tr>
                
              
                @endforeach

                
            </table>
        </div>
    </div>
</body>
</html>
@endsection