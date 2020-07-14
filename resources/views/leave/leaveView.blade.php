<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>leave_view</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
       <div class="container mt-5">
           <div class="col-12">
            <div class="input-group col-md-12">
                <input class="form-control py-2 border-right-0 border" type="search" placeholder="search.." id="myInput">
                <span class="input-group-append">
                  <button class="btn btn-outline-secondary border-left-0 border" type="button">
                        <i class="fa fa-search"></i>
                  </button>
                </span>
            </div>
            <table class="table table-border mt-5" >
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>action</th>
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
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
   });
  });
 </script>
</body>
</html>