<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Mail</title>
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="col-12">
               {{-- <p>Hello {{ $details['fristNameManager'] }} {{ $details['lastNameManager'] }},</p> --}}
               <br>
               <p>Employee {{ $details['firstName'] }} {{ $details['lastName'] }} has submitted the following leave request for approval:</p>
            </div>

        </div>

    <div class="card p-3 bg-light ml-5" style="width: 700px">
        <div class="row">
            <div class="col-6">
                <p><strong>Start date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['startdate'] }}</p>
                <p><strong>Emd date </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['enddate'] }}</p>
                <p><strong>Duration </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['duration'] }}</p>
                <p><strong>Leave type </strong> &nbsp;&nbsp;&nbsp;&nbsp;{{ $details['type'] }}</p>
            </div>
            <div class="col-6">
                <p><strong>Comment </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['comment'] }}</p>
                <p><strong>Employee </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $details['firstName'] }} {{ $details['lastName'] }}</p>
                <p><strong>Staus </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Request</p>
            </div>   
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <br>
            <p>Can you please ACCEPT or REJECT this leave request .You can also access to 
            <a href="http://127.0.0.1:8000">leave request details</a> to review this request</p>
            <p>Thanks & regards,</p>
            <p><strong>{{ $details['firstName'] }} {{ $details['lastName'] }}</strong></p>
        </div>
    </div>

    </div>
</body>
</html>