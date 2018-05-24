<?php
$i = 0;
?>
@extends('layouts.app')
@section('title','Enrollment Portal')

@section('content')
   <div class="card-header">
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
     <th > <div align="center">SUBJECTID</div></th>
     <th > <div align="center">SUBJECTNAME</div></th>
    <th > <div align="center">FOR</div></th>   
    <th > <div align="center">DAY</div></th>
    <th > <div align="center">TIME</div></th>
    <th> <div align="center">CREDIT</div></th>
    <th> <div align="center">ROOM</div></th>
    <th> <div align="center">INSTRUCTOR</div></th>
     
   
  </tr>
</thead>
  <?php 
  $servername = "localhost";
  $username = "kirei";
  $password = "5554764s";
  $dbname = "project";
  $link = mysqli_connect($servername,$username,$password,$dbname);
  mysqli_set_charset($link, "utf8");
  $sq1 = "SELECT si.* , sd.* , s.* FROM subject_info si,subject_dates sd, subject s WHERE si.subject_id = s.subject_id AND s.date_id = sd.id";
  $result = mysqli_query($link,$sq1);

  while($a = mysqli_fetch_assoc($result)){
  ?>
<tbody id="course">
  <tr>
    <td><center>{{ $a['subject_id'] }}</center></td>
    <td><center>{{ $a['subject_name'] }}</center></td>
    <td><center>
    @if($a['foryear'] == 1)
    First Year
    @elseif($a['foryear'] == 2)
    Second Year
    @elseif($a['foryear'] == 3)
    Thrid Year
    @endif
    </center></td>
    <td><center>{{ $a['day']}}</center></td>
    <td><center>{{ $a['start_from'] }}-{{ $a['end_at'] }}</center></td>
    <td><center>{{ $a['credit'] }}</center></td>
    <td><center>{{ $a['roomid'] }}</center></td>
    <td><center>{{ $a['instructor'] }}</center></td>
</tr>
<?php
   $i = $i + 1;
}
?>
</tbody>
</table>
<br><hr>
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
