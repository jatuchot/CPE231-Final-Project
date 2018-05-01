<?php
$i = 0;
use App\StudentInfo;

$curUser = Auth::user();
$user = StudentInfo::where('user_id','=',$curUser->id)->first();
?>
@extends('layouts.app')
@section('title','Activity Portal')

@section('content')
   @include('components.title', [
	"title" => "Create Activity Page",
	"desc" => "Use for submit activity and delete activity"
   ])
@if ($errors->any())
          <div class="alert alert-danger" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
          </div><br>
      @endif
      @if (!empty($success))
        <div class="alert alert-success" role="alert">
          <p>{{$success }}</p>
        </div><br>
      @endif

				<form class="form-horizontal" method="post" action="{{ url('activity/create') }}">
					{{csrf_field()}}
						<div class="form-group">
						<div class="col-sm-12">

						<label for="actname">Activity Name :</label>
						<input id="actname" type="text" class="form-control" name="actname">
						</div></div>

						<div class="form-group">
                                                <div class="col-sm-12">
						<label for="participant">Participant :&emsp; </label>
						<label class="checkbox-inline"><input name="participant[]" type="checkbox" value="1">First Year Student</label>
						<label class="checkbox-inline"><input name="participant[]" type="checkbox" value="2">Second Year Student</label>
						<label class="checkbox-inline"><input name="participant[]" type="checkbox" value="3">Third Year Student</label>
						</div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pact">President Activity Name :</label>
                                                <input id="pact" type="text" class="form-control" name="pact" value="{{ $user->Firstname }} {{ $user->Lastname }}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="pactID">President StudentID :</label>
                                                <input id="pactID" type="text" class="form-control" name="pactID" value="{{ Auth::user()->name }}" readonly>
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="padvisor">Advisor of Activity :</label>
                                                <input id="padvisor" type="text" class="form-control" name="padvisor">
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="hour">Given Hours :</label>
                                                <input id="hour" type="number" class="form-control" name="hour">
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="start_form">Start From :</label>
                                                <input id="start_form" type="date" class="form-control" name="start_from">
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="end_at">End At :</label>
                                                <input id="end_at" type="date" class="form-control" name="end_at">
                                                </div></div>
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
    <th > <div align="center">APPROVE STATUS</div></th>
    <th > <div align="center">DELETE?</div></th>

  </tr>
  <?php use App\ActivityInfo;
  $act = ActivityInfo::get();
  ?>

  @foreach($act as $a)
  @if($a['presidentID'] == Auth::user()->name )
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
    @if($a['status'] == "0") Pending
    @elseif($a['status'] == "1") Approved
    @elseif($a['status'] == "2") Ignored @endif
    </center></td>
    <td><center>
    <form action="/activity/delete/{{ $a['id'] }}" method="post">
            {{csrf_field()}}
            <button type="submit" name="action">GO!</button>
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
@endsection
@section('footer')
<script src="/js/bootstrap-datepicker.js"></script>
@endsection
