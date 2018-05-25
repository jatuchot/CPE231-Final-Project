<?php
$i = 0;
?>
@extends('layouts.app')
@section('title','UserInfo Portal')

@section('content')
   <div class="card-header">
   @include('components.title', [
        "title" => "Show All information",
        "desc" => "Use for show information of All Student"
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
<div class="table-responsive">
<table border="0" width="100%" class="table table-bordered table-striped">
  <tr>
     <th > <div align="center">STUDENTID</div></th>
     <th > <div align="center">NAME</div></th>
    <th > <div align="center">ชื่อนามสกุล</div></th>   
    <th > <div align="center">TELEPHONE</div></th>
    <th > <div align="center">EMAIL</div></th>
   
  </tr>
  <?php 
  use App\User;
  use App\StudentInfo;
  $u = User::orderBy('username','asc')->get();
  $student = StudentInfo::get();
  ?>
  @foreach($u as $a)
  @foreach($student as $s)
  @if($s['user_id'] == $a['id'])
  <tr>
    <td><center>{{ $a->username }}</center></td>
    <td><center>{{ $s['Firstname'] }} {{ $s['Lastname'] }}</center></td>
    <td><center>{{ $s['FirstnameTH'] }} {{ $s['LastnameTH'] }}</center></td>
    <td><center>{{ $s['phone_num'] }}</center></td>
    <td><center>{{ $s['Personal_Email'] }}</center></td>
    <?php $i = $i + 1; ?>

</tr>
@endif
@endforeach
@endforeach

   
</table>
</div><br><hr>
	<?php 
		if($i >= 2){
			echo "Student in our record are " . $i . " person";
		}
		else{
			echo "Student in our record is " . $i . " person";
		}
	?>
</div>
@endsection
