@extends('layouts.app')
@section('title', 'Giving Hour for Participant')

@section('content')
<div class="card">
<div class="card-header" id="header">
    @include('components.title', [
        "title" => "Giving Hour for Participant",
        "desc" => "ให้ชั่วโมงกิจกรรม"
    ])
</div>

<style type="text/css">
  body{
//    font-family: cloud;
  }
  #title{
    font-size: 20px;
    font-family: cloud;
    background-color: #c58ec3;
    color: #fff;
  }
  #header{
    font-size: 17px;
    font-family: cloud;
    background-color: #f5d9f5;
  }
  #count{
    font-size: 17px;
    font-family: cloud;
  }
  .btn-pink{
    background-color: #c58ec3;
    color: #fff;
    font-size: 16px;
    font-family: cloud;
    transition: 0.2s;
  }
  .btn-pink:hover{
    background-color: #f4c6f4;
    color: #555;
    font-family: cloud;
  }
  .desc{
    font-family: cloud;
    font-size: 16px;
  }
</style>

<div class="card-body">
<div class="row">
<?php
use App\ActivityInfo;
$user = Auth::user();
$student = DB::table('student_info')->where('user_id','=',$id)->first();
$user1 = DB::table('users')->join('student_info','users.id','=','student_info.user_id')->select('users.role')->first();
$activity = ActivityInfo::where('participant','=',$user1->role)->get();
?>

<div class="col-sm-4">
@if($student->image_filename == null)
  <img src="/../../img/user1.png" style="width:100%;border-radius: 5px;">
@else
  <img src="/../../img/profile/{{ $student->image_filename }}" style="width:100%;border-radius: 5px;">  
@endif
</div>
<div class="col-sm-8">
  <div class="panel panel-default">
    <div class="panel-heading" id="header"><i class="fa fa-fw fa-user"></i>&nbsp;ลงทะเบียนให้ เวลากิจกรรม</div>
    <div class="panel-body">
     <form name="myform" class="form-horizontal" action="" method="post">
	{{csrf_field()}}
      <div class="form-group" style="font-family: cloud;font-size: 16px;">
	<label class="control-label col-sm-2" for="fullname">ID :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" value="{{ $student->id }}" readonly>
        </div>
	<label class="control-label col-sm-2" for="fullname">Fullname :</label>
        <div class="col-sm-10">
	<input type="text" class="form-control" value="{{ $student->Firstname }} {{ $student->Lastname }}" readonly>
	</div>
	<label class="control-label col-sm-2" for="fullname">Student ID :</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" value="{{ $student->student_id }}" readonly>
        </div>
        <label class="control-label col-sm-2" for="fullname">Activity Name :</label>
        <div class="col-sm-10">
		<select class="form-control" id="actid" name="actid">
            <option value="/">โปรดเลือก</option>
	    @foreach($activity as $a)
            <option value="{{ $a->id }}">{{$a->activitiesName }} : {{ $a->amountHours }}
            </option>
	    @endforeach
        </select><br><center>
	<button type="submit" class="btn btn-primary">SEND</button></center>
      </form> 
    </div>
  </div>
</form>
</div>
</div>
</div>

@endsection

