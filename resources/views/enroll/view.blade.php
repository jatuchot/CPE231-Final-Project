@extends('layouts.app')
@section('title','Enrollment Portal')

@section('content')
<div class="card">
   <div class="card-header bg-light">
   @include('components.title', [
        "title" => "Show All Open Course",
        "desc" => "This page is showing all of the course that open in this semester"
   ])
   </div>

<style>
hr{
border: 1px solid #ccc;
}
</style>
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
<div class="card-body">
<div id="result"></div>
<div class="col-12">
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-search"></i></div>
        </div>
        <input type="text" class="form-control" id="searchCourse" placeholder="Search By Course ID">
      </div>
    </div>


<table border="0" width="100%" class="table table-bordered table-responsive-sm table-striped">
<thead>
  <tr style="background-color: #f8afc1;">
	<th > <div align="center">NO</div></th>
     <th > <div align="center">SUBJECTID</div></th>
     <th > <div align="center">SUBJECTNAME</div></th>
    <th > <div align="center">FOR</div></th>   
    <th > <div align="center">DAY</div></th>
    <th > <div align="center">TIME</div></th>
    <th> <div align="center">CREDIT</div></th>
    <th> <div align="center">SEC</div></th>
    <th> <div align="center">ROOM</div></th>
    <th> <div align="center">INSTRUCTOR</div></th>
     
   
  </tr>
</thead>
  <?php 
  $year = date('Y');
        $month = date('m');
        $term = 0;
        if($month >= 8){
            $term = 1;
        }
        else if($month >=1 && $month < 8){
            $term = 2;
        }

  $i = 1;
  $course = DB::table('subject_info')
		->join('teacher_info','subject_info.instructor','=','teacher_info.id')
		->where('term','=',$term)
		->orderBy('foryear')
		->get();
  ?>
@foreach($course as $a)
<tbody id="course">
  <tr>
    <td><center>{{ $i }}</center></td>
    <td><center>{{ $a->subject_id }}</center></td>
    <td><center>{{ $a->subject_name }}</center></td>
    <td><center>
    @if($a->foryear == 1)
    First Year
    @elseif($a->foryear == 2)
    Second Year
    @elseif($a->foryear == 3)
    Thrid Year
    @endif
    </center></td>
    <td><center>{{ $a->day}}</center></td>
    <td><center>{{ date('H:i',strtotime($a->start_from)) }}-{{ date('H:i',strtotime($a->end_at)) }}</center></td>
    <td><center>{{ $a->credit }} </center></td>
    <td><center>{{ $a->section }}</center></td>
    <td><center>{{ $a->roomid }}</center></td>
    <td><center>{{ $a->Firstname }} {{ $a->Lastname }}</center></td>
</tr>
<?php
   $i = $i + 1;
?>
@endforeach
</tbody>
</table>
<br><hr>
</div>
</div>
<script>
var count = 0;
$(document).ready(function(){
  $("#searchCourse").on("keyup", function() {
    var value = $(this).val().toUpperCase();
    $("#course tr").filter(function() {
      $(this).toggle($(this).text().toUpperCase().indexOf(value) > -1)
    });
    console.log(count.length);
  });
});
</script>
@endsection
