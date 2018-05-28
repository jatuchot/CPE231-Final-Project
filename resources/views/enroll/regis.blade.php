<?php
$i = 0;
$curUser = Auth::user();
if($curUser->role == 4 || $curUser->role == 5){
     echo '<script type="text/javascript">';
     echo 'setTimeout(function () { swal("WOW!","Message!","success");';
     echo '}, 1000);</script>';
     header("refresh:1; url=/");
     return redirect()->route("home");
}
?>

@extends('layouts.app')
@section('title','Enrollment Portal')

@section('content')
<div class="card">
   <div class="card-header bg-light">
   @include('components.title', [
        "title" => "Enrollment page",
        "desc" => "Use for enrollment the course"
   ])
   </div>
@if(session('success'))
<script>
          swal({
  title: "ส่งข้อมูลเรียบร้อยแล้ว!",
  text: "Your information has been submitted.",
  icon: "success",
  button: "OK! :)",
});
</script>
@endif
<style>
hr{
border: 1px solid #ccc;
}
</style>
<?php
$user = App\StudentInfo::where('user_id','=',$curUser->id)->first();
/* $subject = DB::table('subject')
		->join('subject_dates','subject.date_id','=', 'subject_dates.id')
		->join('subject_info','subject.subject_id','=', 'subject_info.subject_id')
		->select('subject.*','subject_info.*','subject_dates.*')
		->where('foryear','=',$curUser)
		->get();
*/
$year = date("Y");
$month = date("m");
$value = 0;
if($month > 8){
   $value = 1;
}
else if($month >=1 && $month < 6){
   $value = 2;
}
$t = $value."/".$year;

$subject = DB::table('subject_info')
		->where('foryear','=',$curUser->role)
		->where('term','=',$value)
		->orderBy('subject_id','asc')
		->get();

$check = DB::table('enrollments')
		->join('subject_info','enrollments.subjectid','=','subject_info.id')
		->join('student_info','enrollments.studentid','=','student_info.student_id')
		->select('subject_info.*')
		->where('enrollments.studentid','=',$user->student_id)
		->where('enrollments.term','=',$t)
		->get();
?>

<div class="card-body">
<label>In this semester you can select only the course below.</label>
<!-- Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Course</button>
<hr>
<div class="modal fade" id="add" role="dialog" >
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">  
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>In this semester you can select only the course below. {{ $year }} {{ $month }} {{ $value }}</label>
        <form method="POST" action="/enroll/regis/{{ $user->id }}" enctype="multipart/form-data">
	{{csrf_field()}}
	<input type="hidden" name="term" value="{{ $value }}/{{ $year }}">
          <div class="form-group" id="boss">
<div class="table-responsive-sm">
	    <table class="table table-bordered">
<thead>
<tr>
  <th>No</th>
  <th>Subject ID</th>
  <th>Subject Name</th>
  <th>Date</th>
  <th>Time</th>
  <th>Room</th>
  <th>Add?</th>
</tr>
</thead>

<tbody>
  @foreach($subject as $s2)
  <tr>
  <td>{{ $s2->id }} </td>
  <td>{{ $s2->subject_id }} Sec:{{ $s2->section }}</td>
  <td>{{ $s2->subject_name }} (credit: {{ $s2->credit }})</td>
  <td>{{ $s2->day }}</td>
  <td>{{ date('H:i',strtotime($s2->start_from)) }}-{{ date('H:i',strtotime($s2->end_at)) }}</td>
  <td>{{ $s2->roomid }}</td>
  <td><input id="check" name="subject_id[]" type="checkbox" value="{{ $s2->id }}"></td>
  </tr>
  @endforeach

</tbody>



</table>
</div>
</div>
</div>
      <div class="modal-footer">
	<center>
	<button type="submit" class="btn btn-success">Send</button>
	</center>
	</form>
      </div>
    </div>
  </div>
</div>

<hr>
<table class="table table-bordered table-responsive-sm">
<thead>
<tr>
  <th>No</th>
  <th>Subject ID</th>
  <th>Subject Name</th>
  <th>Section</th>
  <th>Date</th>
  <th>Time</th>
  <th>Room</th>
</tr>
</thead>
<tbody>
@foreach($check as $s1)
  <tr>
  <td>{{ $s1->id }} </td>
  <td>{{ $s1->subject_id }}</td>
  <td>{{ $s1->subject_name }} (credit: {{ $s1->credit }})</td>
  <td>{{ $s1->section }} </td>
  <td>{{ $s1->day }}</td>
  <td>{{ date('H:i',strtotime($s1->start_from)) }}-{{ date('H:i',strtotime($s1->end_at)) }}</td>
  <td>{{ $s1->roomid }}</td>
  </tr>
  @endforeach
</tbody>
</table>
<br>
<p>
</p>
</div>
</div>
<script>
/*
function print(){
	var x = document.forms[0];
	var i = 0;
	var j = "";
	for(i = 0; i < x.length;i++){
	    if(x[i].checked){
		j = j + x[i].value;
	    }
	}
	document.getElementById("printTable").innerHTML = j + ","; 
	console.log(j);
	$('#add').modal('hide');
}*/
</script>
@endsection

