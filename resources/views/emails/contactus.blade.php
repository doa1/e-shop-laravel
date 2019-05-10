<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap/css/bootstrap.min.css">

</head>
<body>
    <div class="container col-md-8 ml-4">
    <h2>Contact Form</h2>

    <div> {{$Name}} just contacted us: </div>
    <div>From: {{$Email}}</div>
    <div> Subject: {{ $emailSubject }} </div>
    <div> Message: {{ $emailMessage }} </div>
    </div>
</body>
</html>
