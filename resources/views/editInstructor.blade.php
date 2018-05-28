<?php
$i = 0;
use App\TeacherInfo;

$curUser = Auth::user();

$user = TeacherInfo::where('user_id','=',$curUser->id)->first();
$subject = DB::table('subject_info')
		->join('teacher_info','subject_info.instructor','=','teacher_info.id')
		->where('instructor','=',$user->id)
		->get();

?>
@extends('layouts.app')
@section('title','Profile Portal')

@section('content')
<style>
#tpink{
   background-color: #e1bee7;
}
#green{
   background-color: #c8e6c9;
}
#yellow{
   background-color: #ffe0b2;
}
</style>
<div class="card">
<div class="card-header bg-light">
   @include('components.title', [
	"title" => "Teacher's Information",
	"desc" => "Use for edit your information"
   ])
</div>
@if ($errors->any())
          <div class="alert alert-danger" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
          </div><br>
      @endif
<div class="card-body">

<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-header" id="green">
<i class="fa fa-file-image-o" aria-hidden="true"></i> Picture
</div>
<div class="card-body">
<center>
      <img class="img-fluid" src="/img/staff/{{ $user->image_filename }}">
</center>
</div>
</div>
</div>

<div class="col-sm-8">
<div class="card">
<div class="card-header" id="yellow">
<i class="fa fa-info-circle" aria-hidden="true"></i> Personal Infomation
</div>
<div class="card-body">
				<form class="form-horizontal" method="post" action="/edit/instructor/{{ $user->id }}" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="row">
						<div class="col-sm-6">
                                                <label for="pfirstname">Firstname :</label>
                                                <input id="pfirstname" type="text" class="form-control" name="pfirstname" value="{{ $user->Firstname }}">
						</div>
						<div class="col-sm-6">
                                                <label for="plastname">Lastname :</label>
                                                <input id="plastname" type="text" class="form-control" name="plastname" value="{{ $user->Lastname }}">
						</div>
						</div>
                                                <label for="pidentification">Identification Number :</label>
                                                <input id="pidentification" type="text" class="form-control" name="pidentification" value="{{$user->Identification_Number }}" readonly>

						<div class="row">
						<div class="col-sm-6">
                                                <label for="pfirstTH">ชื่อ :</label>
                                                <input id="pfirstTH" type="text" class="form-control" name="pfirstTH" value="{{$user->FirstnameTH }}" >
						</div>
						<div class="col-sm-6">
                                                <label for="psurname">นามสกุล :</label>
                                                <input id="psurname" type="text" class="form-control" name="psurname" value="{{$user->LastnameTH }}" >
						</div>
						</div>
                                                <label for="pgender">Gender :</label>
                                                <input id="pgender" type="text" class="form-control" name="pgender" value="{{$user->gender }}" readonly>

                                                <label for="paddress">Address :</label>
                                                <input id="paddress" type="text" class="form-control" name="paddress" value="{{$user->address }}" >

                                                <label for="phone">Phone Number :</label>
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone_num }}" >

                                                <label for="personal_email">E-Mail :</label>
                                                <input id="personal_email" type="text" class="form-control" name="personal_email" value="{{$user->Personal_Email }}" >

                                                <label for="kmail">Kmutt E-mail :</label>
                                                <input id="kmail" type="text" class="form-control" name="kmail" value="{{$user->Kmutt_Email }}" readonly>

                                                <label for="DOB">Date of Birth :</label>
                                                <input id="DOB" type="text" class="form-control" name="DOB" value="{{$user->DOB }}" readonly>
						<br>
						<center>
						<button type="submit" class="btn btn-primary">Edit</button>
						</center><br><br>
</form>	
</div>
</div>
</div>
</div>
<hr>
<div class="card">
<div class="card-header text-white bg-info">
<i class="fa fa-graduation-cap" aria-hidden="true"></i> Open Course
</div>
<div class="card-body">
@foreach($subject as $s)
<li>{{ $s->subject_id}} : {{ $s->subject_name }} (section : {{ $s->section }})</li>
@endforeach
</div>
</div>
</div>

@endsection


