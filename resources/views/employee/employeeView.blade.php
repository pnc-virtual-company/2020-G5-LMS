<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <table class="table table-border mt-5" id="employee" class="display" cellspacing="0">
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
       <style>
table {
  font-family: verdana;
  font-size: 12px;
}

table th {
  text-align: left;
  background: #D3D3D3;
  padding: 2px;
}

table tr:hover {
  background: #EFEFEF;
}

table tr {
  text-align: left;
}

table td {
  padding: 5px;
}

table td a {
  color: #0454B5;
}
     </style>
         </div>
     </div>
     <script>
  // function for research data
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
     });
  //  mouse hover on table
     var trIndex = null;
   $("#employee tr td").mouseenter(function() {
     trIndex = $(this).parent();
     $(trIndex).find("td:last-child").html('<a href="#"><i class="material-icons" style="color:red;">mode_delete</i></a>&nbsp;&nbsp;<a href="#"><i class="material-icons">mode_edit</i></a>');
   });
 // remove button on tr mouseleave
  $("#employee tr td").mouseleave(function() {
     $(trIndex).find('td:last-child').html("&nbsp;");
   });
  });
    </script>
</body>
</html>