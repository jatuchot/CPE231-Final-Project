<?php
$i = 1;
?>
@extends('layouts.app')
@section('title','Activity Portal')

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
    text-align: center;
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
<div class="card">
   <div class="card-header bg-light">
   @include('components.title', [
        "title" => "Listing activity and Hour for Activity Page",
        "desc" => "Use for know a hour that you get from activity"
   ])
   </div>
<div class="card-body">
<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-header" id="header"><center>Success Activity</center></div>
<div class="card-body">
<center><span id="count">{{ $count }}</span></center>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-header" id="header"><center>Total Hours</center></div>
<div class="card-body">
<center><span id="count">{{ $all }}</span></center>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-header" id="header"><center>To Graduate You need to have Hours</center></div>
<div class="card-body">
<center><span id="count">{{ $all }}/500</span></center>
</div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header" id="header">Detail of Activity</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Activity Name</th>
<th>When</th>
<th>Hours</th>
</tr>
</thead>
<tbody>
@foreach($hour as $h)
<tr>
<td>{{ $i }}</td>
<td>{{ $h->activitiesName }}</td>
<td>From : {{ $h->startFrom }}<br> To : {{ $h->endAt }}</td>
<td>{{ $h->amountHours }}</td>
</tr>
<?php 
$i = $i + 1;
?>
@endforeach

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
