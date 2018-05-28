<?php
$i = 0;
?>
@extends('layouts.app')
@section('title','ActivityInfo Portal')

@section('content')
<div class="card">
<div class="card-header bg-light">
   @include('components.title', [
        "title" => "Show All Activity",
        "desc" => "Use for show information of All created activity"
   ])
</div>
<style>
.panel-body {
background:#fbe0e6;
}
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

<div class ="card-body">
<table border="1" width="100%" class="table table-bordered table-condensed table-responsive-sm table-striped">
  <tr>
  <th > <div align="center">No.</div></th>
     <th > <div align="center">ACTIVITY NAME</div></th>
    <th > <div align="center">PRESIDENT ACTIVITY</div></th>
    <th > <div align="center">STUDENTID</div></th>
    <th > <div align="center">ADVISOR</div></th>
    <th > <div align="center">FOR</div></th>
    <th > <div align="center">APPROVE STATUS</div></th>
  </tr>
<?php use App\ActivityInfo;
  $act = ActivityInfo::get();
  ?>

  @foreach($act as $a)
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
    @endforeach
   
</table>
<br><hr>
</div>
</div>
@endsection
