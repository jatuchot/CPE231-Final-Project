<?php

$i = 0;
?>
@extends('layouts.app')
@section('title','Enrollment Portal')

@section('content')
   <div class="card-header">
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
$curUser = Auth::user();
$user = App\StudentInfo::where('user_id','=',$curUser->id)->first();
/* $subject = DB::table('subject')
		->join('subject_dates','subject.date_id','=', 'subject_dates.id')
		->join('subject_info','subject.subject_id','=', 'subject_info.subject_id')
		->select('subject.*','subject_info.*','subject_dates.*')
		->where('foryear','=',$curUser)
		->get();
*/
$subject = DB::table('subject_info')
		->whereNotExists(function ($query) {
			$query->select(DB::raw(1))
				->from('enrollments')
				->whereRaw('enrollments.subjectid = subject_info.id');
		})
		->where('foryear','=',$curUser->role)
		->get();

$check = DB::table('enrollments')
		->join('student_info','enrollments.studentid','=','student_info.user_id')
		->join('subject_info','enrollments.subjectid','=','subject_info.id')
		->select('subject_info.*')
		->where('user_id','=',$user->id)
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
        <label>In this semester you can select only the course below.</label>
        <form method="POST" action="/enroll/regis/{{ $user->user_id }}" enctype="multipart/form-data">
	{{csrf_field()}}
          <div class="form-group" id="boss">
	    <table class="table table-bordered table-responsive-sm">
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
  <td>{{ $s2->subject_id }}</td>
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

