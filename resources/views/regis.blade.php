<?php
$curUser = Auth::user()->id;
$username = Auth::user()->username;
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
<div class="col-md-10 col-md-offset-1">
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">20% : You need to insert profile_data </div>
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">80% : more to go </div>
</div></div>
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-success">
<div class="panel panel-heading">
<center><h1>
        First Year Registration
</center></h1>
</div>
<div class="panel panel-body">

<form class="form-horizontal" action = "/insertinfo.php" method="post">
StudentID:<input type="text" class="form-control" name="sid" value="{{ $username }}" readonly>
Identification Number: <input type= "text" class="form-control" name="identification_number">
USER ID: <input type= "text" class="form-control" name="id" value="{{ $curUser }}" readonly>
Firstname <input type="text" class="form-control" name="Firstname">
Lastname: <input type="text" class="form-control" name="Lastname">
ชื่อจริง: <input type="text" class="form-control" name="FirstnameTH">
นามสกุล: <input type="text" class="form-control" name="LastnameTH">
Gender: <select class="form-control" name="gender">
	<option value="" disabled="disabled"selected>Options</option>
	<option value="M">M</option>
	<option value="F">F</option>
	</select>
Address: <input type="text" class="form-control" name="address">
Personal Email: <input type="email" class="form-control" name="Personal_Email">
Kmutt Email: <input type="email" class="form-control" name="Kmutt_Email">
Phone Number: <input type="tel" class="form-control" name="phone_num">
Date of Birth: <input type="date" class="form-control" name="DOB">
<center><button type="submit" class="btn btn-primary">Submit</button></center>
</div>
</div>
</div>
</form>
</body>
</html>


