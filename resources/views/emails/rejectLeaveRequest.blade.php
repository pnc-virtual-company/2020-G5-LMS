<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Leave Request</h3><br>
    <p>Dear {{ $verify['firstName'] }} {{ $verify['lastName'] }},</p><br>
    <p>The time of you requested has not been reject</p>
    <div class="card p-3 bg-light ml-5">
        <p><strong>From </strong> &nbsp;&nbsp; {{ $verify['startDate'] }}</p>
        <p><strong>To &nbsp;&nbsp;{{ $verify['endDate'] }}</p>
        <p><strong>Leave type &nbsp;&nbsp; {{ $verify['type'] }}</p>
        <p><strong>Last Comment &nbsp;&nbsp; {{ $verify['comment'] }}</p>
    </div>
</body>
</html>