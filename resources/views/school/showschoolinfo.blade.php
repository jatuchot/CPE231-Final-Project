<?php
$i = 0;
use App\StudentInfo;
use App\SchoolInfo;


$curUser = Auth::user();
$rUser = StudentInfo::where('id','=',$curUser->id)->first();
$user = SchoolInfo::where('id','=',$rUser->id)->first();

if($user === null)
{
	header("refresh:1; url=/school/info");
	return redirect('/school/info');
}

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
				<form class="form-horizontal" method="post" action="/school/showschoolinfo" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="form-group">

                                                 <div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="user_id">USER ID :</label>
                                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{$curUser->id}}" readonly>
                                                </div></div>
						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy10">Certificate Level :</label>
                                                <input id="phy10" type="text" class="form-control" name="phy10" value="{{ $user->Cert_level }}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="user_id">id :</label>
                                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{ $rUser->id }}"readonly >
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="GPAX">GPA of Grade 12 Physic :</label>
                                                <input id="GPAX" type="text" class="form-control" name="GPAX" value="{{ $user->GPAX }}"readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="schoolname">School Name :</label>
                                                <input id="schoolname" type="text" class="form-control" name="schoolname" value="{{$user->schoolname}}"readonly>
                                                </div></div>

						
            <center>
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



