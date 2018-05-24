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

<style>
hr{
border: 1px solid #ccc;
}
</style>
<?php
$curUser = Auth::user()->role;
$subject = DB::table('subject')
		->join('subject_dates','subject.date_id','=', 'subject_dates.id')
		->join('subject_info','subject.subject_id','=', 'subject_info.subject_id')
		->select('subject.*','subject_info.*','subject_dates.*')
		->where('foryear','=',$curUser)
		->get();
?>
<div class="card-body">
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Course</button>
<div class="modal fade" id="add" role="dialog" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="courseid" class="col-form-label">CourseID:</label>
	    <select class="form-control" id="subject_id">
	    <option value="/enroll/regis">โปรดเลือก</option>
	    @foreach($subject as $s)
	    <option value="{{ $s->subject_id }}">
		{{ $s->id }} - {{ $s->subject_id }} | {{ $s->instructor }} For :
			@if($s->foryear == 1) First Year
			@elseif($s->foryear == 2) Second Year
			@elseif($s->foryear == 3) Third Year
			@endif
			{{ $s->day }}
			({{ date('H:i',strtotime($s->start_from)) }} - {{ date('H:i',strtotime($s->end_at)) }}) Room : {{ $s->roomid }}
            @endforeach
	    </option>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>

  </div>
</div>
-->
<table class="table table-bordered table-responsive-sm">
<thead>
<tr>
  <th>Subject ID</th>
  <th>Subject Name</th>
  <th>Date</th>
  <th>Time</th>
  <th>Room</th>
</tr>
</thead>

<tbody>
  @foreach($subject as $s1)
  <tr>
  <td>{{ $s1->subject_id }}</td>
  <td>{{ $s1->subject_name }}</td>
  <td>{{ $s1->day }}</td>
  <td>{{ $s1->start_from }} - {{ $s1->end_at }}</td>
  <td>{{ $s1->roomid }}</td>
  </tr>
  @endforeach

</tbody>



</table>

<hr>
<hr>
<br>
<p>
<button> Accept </button>
</p>
</div>
@endsection
