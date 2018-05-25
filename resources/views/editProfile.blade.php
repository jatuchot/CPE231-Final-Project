<?php
$i = 0;
use App\StudentInfo;


$curUser = Auth::user();

$user = StudentInfo::where('user_id','=',$curUser->id)->first();

?>
@extends('layouts.app')
@section('title','Activity Portal')

@section('content')
<div class="card-header">
   @include('components.title', [
	"title" => "Student's Information",
	"desc" => ""
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
      @if (isset($withSuccess))
<script>
	  swal({
  title: "ส่งข้อมูลเรียบร้อยแล้ว!",
  text: "Your information has been submitted.",
  icon: "success",
  button: "OK! :)",
});
</script>
      @endif
<div class="card-body">
				<form class="form-horizontal" method="post" action="/edit/{{ $user->id }}" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="pfirstname">Full Name :</label>
                                                <input id="pfirstname" type="text" class="form-control" name="pfirstname" value="{{ $user->Firstname }}">
                                                </div></div>
            <div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="plastname">Full Name :</label>
                                                <input id="plastname" type="text" class="form-control" name="plastname" value="{{ $user->Lastname }}">
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pID">Student ID :</label>
                                                <input id="pID" type="text" class="form-control" name="pID" value="{{$user->student_id }}" >
                                                </div></div>
            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="Year">Year  :</label>
                                                <input id="Year" type="text" class="form-control" name="Year" value="{{$curUser->role}}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pidentification">Identification Number :</label>
                                                <input id="pidentification" type="text" class="form-control" name="pidentification" value="{{$user->Identification_Number }}" >
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pfirstTH">ชื่อจริง :</label>
                                                <input id="pfirstTH" type="text" class="form-control" name="pfirstTH" value="{{$user->FirstnameTH }}" >
                                                </div></div>
            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="psurname">นามสกุน :</label>
                                                <input id="psurname" type="text" class="form-control" name="psurname" value="{{$user->LastnameTH }}" >
                                                </div></div>
           <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pgender">Gender :</label>
                                                <input id="pgender" type="text" class="form-control" name="pgender" value="{{$user->gender }}" readonly>
                                                </div></div>
          <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="paddress">Address :</label>
                                                <input id="paddress" type="text" class="form-control" name="paddress" value="{{$user->address }}" >
                                                </div></div>
          <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phone">Phone Number :</label>
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone_num }}" >
                                                </div></div>
          <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="personal_email">E-Mail :</label>
                                                <input id="personal_email" type="text" class="form-control" name="personal_email" value="{{$user->Personal_Email }}" >
                                                </div></div>
          <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="kmail">Kmutt E-mail :</label>
                                                <input id="kmail" type="text" class="form-control" name="kmail" value="{{$user->Kmutt_Email }}" readonly>
                                                </div></div>
          <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="DOB">Date of Birth :</label>
                                                <input id="DOB" type="text" class="form-control" name="DOB" value="{{$user->DOB }}" readonly>
                                                </div></div>

						
						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="filepicture">Picture :</label>
                                                
                                                <img src="/img/profile/{{ $user->image_filename }}">
                                                </div></div>
						<center>
						<button type="submit" class="btn btn-primary">Edit</button>
						</center><br><br><hr>
</form>	


</div>
<script>
function makeSure(){
    swal(
    {
        title: "Are you sure?",
        text: "You will not be able to recover your activity data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        showLoaderOnConfirm: true,
        closeOnConfirm: false
        },
        function(isConfirm){
            if(isConfirm) { 
	        $('#delete').submit();
		return true;
            }
	    return false;
        }
    );
}
</script>
@endsection
@section('footer')
<script src="/js/bootstrap-datepicker.js"></script>
@endsection


