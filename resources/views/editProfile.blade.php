<?php
$i = 0;
use App\StudentInfo;
use App\SchoolInfo;

$curUser = Auth::user();

$user = StudentInfo::where('user_id','=',$curUser->id)->first();
$rUser = SchoolInfo::where('user_id','=',$user->id)->first();
$his = App\AcademicHistory::where('student_id','=',$user->student_id)->first();

if($his === null){
    echo "Data not enough : redirect";
    header("refresh:1; url=/school/info");
    return redirect('/school/info');

}

?>
@extends('layouts.app')
@section('title','Profile Portal')

@section('content')
<style>
#tpink{
   background-color: #e1bee7;
}
#green{
   background-color: #c8e6c9;
}
#yellow{
   background-color: #ffe0b2;
}
</style>
<div class="card">
<div class="card-header bg-light">
   @include('components.title', [
	"title" => "Student's Information",
	"desc" => "Use for edit your information"
   ])
</div>
@if ($errors->any())
          <div class="alert alert-danger" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
          </div><br>
      @endif
      @if (isset($withSuccess))
<script>
	  swal({
  title: "ส่งข้อมูลเรียบร้อยแล้ว!",
  text: "Your information has been submitted.",
  icon: "success",
  button: "OK! :)",
});
</script>
      @endif
<div class="card-body">

<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-header" id="green">
<i class="fa fa-file-image-o" aria-hidden="true"></i> Picture
</div>
<div class="card-body">
<center>
      <img class="img-fluid" src="/img/profile/{{ $user->image_filename }}">
</center>
</div>
</div>
</div>

<div class="col-sm-8">
<div class="card">
<div class="card-header" id="yellow">
<i class="fa fa-info-circle" aria-hidden="true"></i> Personal Infomation
</div>
<div class="card-body">
				<form class="form-horizontal" method="post" action="/edit/{{ $user->id }}" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="row">
						<div class="col-sm-3">
                                                <label for="pfirstname">Firstname :</label>
                                                <input id="pfirstname" type="text" class="form-control" name="pfirstname" value="{{ $user->Firstname }}">
						</div>
						<div class="col-sm-3">
                                                <label for="plastname">Lastname :</label>
                                                <input id="plastname" type="text" class="form-control" name="plastname" value="{{ $user->Lastname }}">
						</div>
						<div class="col-sm-3">
                                                <label for="pID">Student ID :</label>
                                                <input id="pID" type="text" class="form-control" name="pID" value="{{$user->student_id }}" readonly>
						</div>
						<div class="col-sm-3">
                                                <label for="Year">Year  :</label><br>
                                                <input id="Year" type="text" class="form-control" name="Year" value="{{$curUser->role}}" readonly>
						</div>
						</div>
                                                <label for="pidentification">Identification Number :</label>
                                                <input id="pidentification" type="text" class="form-control" name="pidentification" value="{{$user->Identification_Number }}" readonly>

						<div class="row">
						<div class="col-sm-6">
                                                <label for="pfirstTH">ชื่อจริง :</label>
                                                <input id="pfirstTH" type="text" class="form-control" name="pfirstTH" value="{{$user->FirstnameTH }}" >
						</div>
						<div class="col-sm-6">
                                                <label for="psurname">นามสกุน :</label>
                                                <input id="psurname" type="text" class="form-control" name="psurname" value="{{$user->LastnameTH }}" >
						</div>
						</div>
                                                <label for="pgender">Gender :</label>
                                                <input id="pgender" type="text" class="form-control" name="pgender" value="{{$user->gender }}" readonly>

                                                <label for="paddress">Address :</label>
                                                <input id="paddress" type="text" class="form-control" name="paddress" value="{{$user->address }}" >

                                                <label for="phone">Phone Number :</label>
                                                <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone_num }}" >

                                                <label for="personal_email">E-Mail :</label>
                                                <input id="personal_email" type="text" class="form-control" name="personal_email" value="{{$user->Personal_Email }}" >

                                                <label for="kmail">Kmutt E-mail :</label>
                                                <input id="kmail" type="text" class="form-control" name="kmail" value="{{$user->Kmutt_Email }}" readonly>

                                                <label for="DOB">Date of Birth :</label>
                                                <input id="DOB" type="text" class="form-control" name="DOB" value="{{$user->DOB }}" readonly>
						<br>
						<center>
						<button type="submit" class="btn btn-primary">Edit</button>
						</center><br><br>
</form>	
</div>
</div>
</div>
</div>
<hr>
<div class="card">
<div class="card-header text-white bg-info">
<i class="fa fa-graduation-cap" aria-hidden="true"></i> School Information and Academic History
</div>
<div class="card-body">
						<label for="user_id">ID FROM STUDENT TABLE :</label>
                                                <input id="id" type="text" class="form-control" name="id" value="{{ $user->id}}" readonly>

                                                <label for="user_id">USER ID :</label>
                                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{ $curUser->id}}" readonly>

                                                <label for="phy10">Certificate Level :</label>
                                                <input id="phy10" type="text" class="form-control" name="phy10" value="{{ $rUser->Cert_level }}" readonly>

                                                <label for="GPAX">GPAX of Grade 12 :</label>
                                                <input id="GPAX" type="text" class="form-control" name="GPAX" value="{{ $rUser->GPAX }}"readonly>

                                                <label for="schoolname">School Name :</label>
                                                <input id="schoolname" type="text" class="form-control" name="schoolname" value="{{$rUser->schoolname}}"readonly>

            <center>
            </center><br><br><hr>
<div class="container">
<div class="table-responsive">
<table class="table table-bordered">
<thead id="tpink">
<tr>
<th>Subject</th>
<th>Grade10</th>
<th>Grade11</th>
<th>Grade12</th>
<th>GPAX</th>
</tr>
</thead>
<tbody>
<tr>
<td>Mathematics</td>
<td>{{ $his->math10 }}</td>
<td>{{ $his->math11 }}</td>
<td>{{ $his->math12 }}</td>
<td> <?php $i = number_format((float)$his->GPAXmth, 2, '.', ''); echo $i;?></td>
</tr>
<tr>
<td>Physics</td>
<td>{{ $his->phy10 }}</td>
<td>{{ $his->phy11 }}</td>
<td>{{ $his->phy12 }}</td>
<td><?php $i = number_format((float)$his->GPAXphy, 2, '.', ''); echo $i;?></td>
</tr>
<tr>
<td>Microbiology</td>
<td>{{ $his->mic10 }}</td>
<td>{{ $his->mic11 }}</td>
<td>{{ $his->mic12 }}</td>
<td><?php $i = number_format((float)$his->GPAXmic, 2, '.', ''); echo $i;?></td>
</tr>
<tr>
<td>Chemistry</td>
<td>{{ $his->chm10 }}</td>
<td>{{ $his->chm11 }}</td>
<td>{{ $his->chm12 }}</td>
<td><?php $i = number_format((float)$his->GPAXchm, 2, '.', ''); echo $i;?> </td>
</tr>
<tr>
<td>English</td>
<td>{{ $his->eng10 }}</td>
<td>{{ $his->eng11 }}</td>
<td>{{ $his->eng12 }}</td>
<td><?php $i = number_format((float)$his->GPAXeng, 2, '.', ''); echo $i;?></td>
</tr>





</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

@endsection


