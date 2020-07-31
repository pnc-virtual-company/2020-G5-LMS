<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h4>Leave Request</h4>
                <p>Dear {{ $accepts['firstName'] }} {{ $accepts['lastName'] }}</p>
                <br>
                <p>This time off your request has been approved.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <p>From         {{ $accepts['startDate'] }}</p>
                <p>To           {{ $accepts['endDate'] }}</p>
                <p>Type         {{ $accepts['type'] }}</p>
                <p>Reason       {{ $accepts['type'] }}</p>
                <p>Last comment {{ $accepts['comment'] }}</p>
            </div>

        </div>

    </div>
</body>
</html>