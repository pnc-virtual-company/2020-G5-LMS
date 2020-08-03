<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            margin-left: 20px;
        }
        table {
          border-collapse: collapse;
          width: 70%;
        }
        
        table, td {
          border: 1px solid black;
          padding: 10px;
        }
        </style>
</head>
<body>
   <div class="container">
       <h4>Leave Request</h4>
       <p>Dear {{ $accepts['firstName'] }} {{ $accepts['lastName'] }}</p>
       <p>The time off you requested has been approved.</p>
       <table>
           <tr>
               <td>From</td>
               <td>{{ $accepts['startDate'] }}</td>
           </tr>
           <tr>
               <td>To</td>
               <td> {{ $accepts['endDate'] }}</td>
           </tr>
           <tr>
               <td>Type</td>
               <td>{{ $accepts['type'] }}</td>
           </tr>
           <tr>
               <td>Last Comment</td>
               <td>{{ $accepts['comment'] }}</td>
           </tr>
       </table>
   </div>
</body>
</html>