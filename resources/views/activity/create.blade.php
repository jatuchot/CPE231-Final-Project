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
	"title" => "Create Activity Page",
	"desc" => "Use for submit activity and delete activity"
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
				<form class="form-horizontal" method="post" action="{{ url('activity/store') }}" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="form-group">
						<div class="col-sm-12">

						<label for="actname">Activity Name :</label>
						<input id="actname" type="text" class="form-control" name="actname" required>
						</div></div>

						<div class="form-group">
                                                <div class="col-sm-12">
						<label for="participant">Participant :&emsp; </label>
						<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="c1">
  <label class="custom-control-label" for="c1">First Year Student</label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="c2">
  <label class="custom-control-label" for="c2">Second Year Student</label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="c3">
  <label class="custom-control-label" for="c3">Third Year Student</label>
</div>
						</div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pact">President Activity Name :</label>
                                                <input id="pact" type="text" class="form-control" name="pact" value="{{ $user->Firstname }} {{ $user->Lastname }}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pactID">President StudentID :</label>
                                                <input id="pactID" type="text" class="form-control" name="pactID" value="{{$user->student_id }}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="padvisor">Advisor of Activity :</label>
                                                <input id="padvisor" type="text" class="form-control" name="padvisor" required>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="hour">Given Hours :</label>
                                                <input id="hour" type="number" class="form-control" name="hour" required>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="start_form">Start From :</label>
                                                <input id="start_form" type="text" class="form-control" placeholder="Pick a date" name="start_from" required>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="end_at">End At :</label>
                                                <input id="end_at" type="text" class="form-control" placeholder="Pick a date" name="end_at" required>
                                                </div></div>
						<div class="col-sm-12">
        <div class="form-group">
        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">.PDF File:</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="file" name="file" accept=".pdf">
    <label class="custom-file-label" for="file">Choose file</label>
  </div>
</div>
<p class="help-block">First row of .PDF file must be header of the file.</p>
						<center>
						<button type="submit" action"{{url('/activity/create')}}" class="btn btn-primary">Submit</button>
						</center><br><br><hr>
</form>	
<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-responsive table-striped">
  <tr>
    <th > <div align="center">No.</div></th>
     <th > <div align="center">ACTIVITY NAME</div></th>
    <th > <div align="center">PRESIDENT ACTIVITY</div></th>
    <th > <div align="center">STUDENTID</div></th>
    <th > <div align="center">ADVISOR</div></th>
    <th > <div align="center">FOR</div></th>
    <th> <div align="center">FILE</div></th>
    <th > <div align="center">APPROVE STATUS</div></th>
    <th > <div align="center">DELETE?</div></th>

  </tr>
  <?php use App\ActivityInfo;
  $act = ActivityInfo::get();
  ?>
  @foreach($act as $a)
  @if($a['presidentID'] == Auth::user()->username )
  <tr>
   <td><center>{{ $a['id'] }}</center></td>
    <td><center>{{ $a['activitiesName'] }}</center></td>
    <td><center>{{ $a['presidentAct'] }}</center></td>
    <td><center>{{ $a['presidentID'] }}</center></td>
    <td><center>{{ $a['advisor'] }}</center></td>
    <td><center>
    @if($a['participant'] == "1")
        First Year Student
    @elseif($a['participant'] == "2")
        Second Year Student
    @elseif($a['participant'] == "3")
        Third Year Student
    @endif

    </center></td>
    <td><center>
    @if($a['PDF_filename'] != "NULL")
            <a href="http://docs.google.com/gview?url=https://dev.bosscpe30.info/download/pdf/{{ $a['PDF_filename'] }}" target="_blank"><button class="btn btn-success">Download</button></a>
    @else
	No
    @endif
    </center></td>
    <td><center>
    @if($a['status'] == "0") Pending
    @elseif($a['status'] == "1") Approved
    @elseif($a['status'] == "2") Ignored @endif
    </center></td>
    <td><center>
    <form id="delete" action="/activity/delete/{{ $a['id'] }}" method="post">
            {{csrf_field()}}
            <button class="btn btn-primary" id="makesure" onclick="return makeSure();">GO!</button>
    </form>
    </center></td>
</tr>
<?php
$i = $i + 1; ?>
@endif
@endforeach
</table>
<?php
                if($i >= 2){
                        echo "You had created " . $i . " Activities";
                }
                else{
                        echo "You had created " . $i . " Activity";
                }
        ?>
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
<script src="/js/createAct.js"></script>
<script src="/js/pickdate.js"></script>
@endsection
@section('footer')
@endsection
