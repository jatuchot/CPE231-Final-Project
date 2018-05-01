<?php
$curUser = Auth::user()->id;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<title>First Year Registration</title>
<style>
div{
    overflow: hidden;
}
</style>
</head>
<body>
<br>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-success">
<div class="panel panel-heading">
<center><h1>
        First Year Registration
</center></h1>
</div>
<div class="panel panel-body">

<form class="form-horizontal" action = "insertinfo.php" method="post">
identification_number: <input type= "text" class="form-control" name="identification_number"><br>
USER_ID: <input type= "text" class="form-control" name="id" value="{{ $curUser }}" readonly><br>
Firstname <input type="text" class="form-control" name="Firstname"><br>
Lastname: <input type="text" class="form-control" name="Lastname"><br>
FirstnameTH: <input type="text" class="form-control" name="FirstnameTH"><br>
LastnameTH: <input type="text" class="form-control" name="LastnameTH"><br>
gender: <input type ="text" class="form-control" name="gender"><br>
address: <input type="text" class="form-control" name="address"><br>
Personal_Email: <input type="email" class="form-control" name="Personal_Email"><br>
Kmutt_Email: <input type="email" class="form-control" name="Kmutt_Email"><br>
phone_num: <input type="tel" class="form-control" name="phone_num"><br>
DOB: <input type="date" class="form-control" name="DOB"><br>
<br>
<center><button type="submit" class="btn btn-primary">Submit</button></center>
</div>
</div>
</div>
</body>
</html>


