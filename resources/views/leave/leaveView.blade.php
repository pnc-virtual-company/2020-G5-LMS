<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>leave_view</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
       <div class="container mt-5">
           <div class="col-12">
            <table class="table table-border">
                <tr class="bg-dark" style="color: #fff">
                    <th>Employee</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Duration</th>
                    <th>Type</th>
                </tr>
                  @foreach ($leave as $leaves)
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
                  @endforeach
            </table>
           </div>
       </div>
</body>
</html>