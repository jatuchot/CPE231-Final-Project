<?php
$curUser = Auth::user()->id;
$username = Auth::user()->username;
?>
@extends('layouts.app3')
@section('title','First Time Registration Portal')

@section('content')

<div class="card">
<div class="card-header text-white bg-info">
<div class="col-sm-12">
<center><h1>
        First Time Registration For Student
</center></h1>
</div>
</div>

<div class="card-body">
<div class="col-sm-12">
<form class="form-horizontal" action = "/regis" method="post">
{{csrf_field()}}
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
Date of Birth: <input id="DOB" type="text" class="form-control" placeholder="Pick a date" name="DOB" required>
</div>
</div>
<div class="card-footer">
<center><button type="submit" class="btn btn-primary">Submit</button></center>
</form>
</div>
</div>
<div class="push"></div>
<script src="/js/pickdate.js"></script>
@endsection


