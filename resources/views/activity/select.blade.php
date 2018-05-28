@extends('layouts.app')
@section('title', 'Giving Hour for Participant')

@section('content')
<style type="text/css">
  #title{
    font-size: 20px;
    background-color: #c58ec3;
    color: #fff;
  }
  #header{
    font-size: 17px;
    background-color: #f5d9f5;
  }
  #count{
    font-size: 17px;
  }
  .btn-pink{
    background-color: #c58ec3;
    color: #fff;
    font-size: 18px;
    transition: 0.2s;
  }
  .btn-pink:hover{
    background-color: #f4c6f4;
    color: #000;
    font-size: 18px;
  }
  .desc{
    font-size: 16px;
  }
</style>


<div class="card card-default">
<div class="card-header" id="header">
    @include('components.title', [
        "title" => "Giving Hour for Participant",
        "desc" => "ให้ชั่วโมงกิจกรรม"
    ])
</div>

<?php
    use App\StudentInfo;
    $user = StudentInfo::orderBy('student_id','asc')->get();
    $countUser = StudentInfo::count();
    $i = 0;
?>

<div class="card card-default">
  <div class="card-header" id="title">
    <i class="fa fa-fw fa-caret-right"></i>&nbsp;Select Participant Name!!
  </div>
<div class="container-fluid">
<div class="row">
<div class="col-sm-9">
    <br>
    <div class="card card-default">
      <div class="card-header" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;SELECT NAME</div>
      <div class="card-body">
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
        <div class="col-sm-12">
          <select class="form-control" id="id">
            <option value="/tools/activity">โปรดเลือก</option>

         @foreach($user as $u)
            <option value="/tools/activity/{{$u->id}}">
            {{$u->student_id}} : {{ $u->Firstname}} {{ $u->Lastname}}
                </option>
            @endforeach

        </select>
        </div>
</div>
</div>
</div>
</div>

<div class="col-sm-3">
    <br>
    <div class="card card-default">
      <div class="card-header" id="header"><i class="fa fa-fw fa-users"></i>&nbsp;FULL AMOUNT</div>
      <div class="card-body">
        <center><span id="count">{{ $countUser }} คน</span></center>
      </div>
    </div>
  </div>
</div>
</div>
<hr>
<hr>
<div class="container-fluid">
<div class="table-responsive">
<table border="0" width="100%" class="table table-bordered table-hover table-condensed table-striped">
  <tr>
    <th > <div align="center">STUDENT ID</div></th>
     <th > <div align="center">NAME</div></th>
    <th > <div align="center">ACTIVITY NAME</div></th>   
    <th > <div align="center">HOURS</div></th>
   
  </tr>
<?php
$table = DB::table('activities')
	->join('activities_info','activities.act_id','=','activities_info.id')
	->join('student_info','activities.user_id','=','student_info.id')
	->select('activities_info.*','student_info.*')
	->get();

?>
@foreach($table as $t)
<tr>
<td>{{ $t->student_id }}</td>
<td>{{ $t->Firstname}} {{$t->Lastname}}</td>
<td>{{ $t->activitiesName }}</td>
<td>{{ $t->amountHours }}</td>
</tr>   
@endforeach
</table>
</div>
</div>
</div>
</div>
<script>
$(function(){
      // bind change event to select
      $('#id').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>


@endsection

@section('footer')

@endsection

