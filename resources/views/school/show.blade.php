<?php
$i = 0;
use App\StudentInfo;
use App\AcademicHistory;


$curUser = Auth::user();


$user = AcademicHistory::where('id','=',$curUser->id)->first();

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
				<form class="form-horizontal" method="post" action="/school/show" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="form-group">

                                                 <div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="user_id">USER ID :</label>
                                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{$curUser->id}}" readonly>
                                                </div></div>
						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy10">GPA of Grade 10 Physic :</label>
                                                <input id="phy10" type="text" class="form-control" name="phy10" value="{{$user->phy10}}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy11">GPA of Grade 11 Physic :</label>
                                                <input id="phy11" type="text" class="form-control" name="phy11" value="{{$user->phy11}}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy12">GPA of Grade 12 Physic :</label>
                                                <input id="phy12" type="text" class="form-control" name="phy12" value="{{$user->phy12}}"readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mth10">GPA of Grade 10 Math :</label>
                                                <input id="mth10" type="number" class="form-control" name="mth10" value="{{$user->math10}}"readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mth11">GPA of Grade 11 Math :</label>
                                                <input id="mth11" type="text" class="form-control" name="mth11" value="{{$user->math11}}"readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mth12">GPA of Grade 12 Math :</label>
                                                <input id="mth12" type="text" class="form-control" name="mth12" value="{{$user->math12}}"readonly>
                                                </div></div>
            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mic10">GPA of Grade 10 BIO :</label>
                                                <input id="mic10" type="number" class="form-control" name="mic10" value="{{$user->mic10}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mic11">GPA of Grade 11 BIO :</label>
                                                <input id="mic11" type="text" class="form-control" name="mic11" value="{{$user->mic11}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mic12">GPA of Grade 12 BIO :</label>
                                                <input id="mic12" type="text" class="form-control" name="mic12" value="{{$user->mic12}}"readonly>
                                                </div></div>
            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="chm10">GPA of Grade 10 Chemistry :</label>
                                                <input id="chm10" type="number" class="form-control" name="chm10" value="{{$user->chm10}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="chm11">GPA of Grade 11 Chemistry :</label>
                                                <input id="chm11" type="text" class="form-control" name="chm11" value="{{$user->chm11}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="chm12">GPA of Grade 12 Chemistry :</label>
                                                <input id="chm12" type="text" class="form-control" name="chm12" value="{{$user->chm12}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="eng10">GPA of Grade 10 English :</label>
                                                <input id="eng10" type="number" class="form-control" name="eng10" value="{{$user->eng10}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="eng11">GPA of Grade 11 English :</label>
                                                <input id="eng11" type="text" class="form-control" name="eng11" value="{{$user->eng11}}"readonly>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="eng12">GPA of Grade 12 English :</label>
                                                <input id="eng12" type="text" class="form-control" name="eng12" value="{{$user->eng12}}"readonly>
                                                </div></div>
            <center>
            <button type="submit" class="btn btn-primary">Save</button>
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



