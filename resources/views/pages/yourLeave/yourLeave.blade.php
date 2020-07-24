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
    <div class="container mt-5">
      <div class="col-12">
          <div class="row">
              <div class="col-6">
                  <h2>Your leave requests</h2>
            </div>
              <div class="col-6">
                <a href="" class="" ><button class="btn btn-warning float-right text-white">Request a leave</button></a>
              </div>
          </div>
          
        <br>
        
            <table class="table table-borderless table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($leaves as $leave)
                <tbody id="btn">
                    <tr>
                    
                        <td class="action">{{$leave->startDate}}</td>
                        <td class="action">{{$leave->endDate}}</td>
                        <td class="action">{{$leave->duration}}</td>
                        <td class="action">{{$leave->types}}</td>
                        <td class="action">
                            
                       
                            @if ($leave -> status == 1)
                            <a href=""><button class="bnt btn-primary">Requested</button></a>
                            @endif
                            @if($leave -> status == 2) 
                            <a href=""><button class="bnt btn-danger">Cancelled</button></a>
                            @elseif($leave -> status == 3)
                            <a href=""><button class="bnt btn-danger">Rejected</button></a>

                            @elseif($leave -> status == 4)
                            <a href=""><button class="bnt btn-success">Accepted</button></a>
                            @endif


                        </td>
                        <td class="action_hidden">
                            <a href="#"><i class="material-icons text-danger">delete</i></a>
                            <a href="#"><i class="material-icons text-success">edite</i></a>
                        </td>
                    </tr>
                </tbody>
              
                @endforeach
                
            </table>
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