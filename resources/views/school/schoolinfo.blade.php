<?php
$i = 0;
use App\StudentInfo;
use App\SchoolInfo;
use App\AcademicHistory;

$curUser = Auth::user();

$user = StudentInfo::where('user_id','=',$curUser->id)->first();

?>
@extends('layouts.app3')
@section('title','Activity Portal')

@section('content')
<div class="card">
<div class="card-header bg-light">
   @include('components.title', [
  "title" => "Student's School Information",
  "desc" => "Use for record student education information"
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
<div class="card border-secondary">
<div class="card-header text-white bg-info">
Education Background </div>
<div class="card-body">
        <form id="create" class="form-horizontal" method="post" action="/school/info/{{ $user->id }}" enctype="multipart/form-data">
          {{csrf_field()}}
            <div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="certlevel">Certificate Level :</label>
                                                <select id="certlevel" class="form-control" name="certlevel">
						<option disabled selected>Please Select one from the choice</option>
                                        	<option value="Grade12">Grade 12</option>
						<option value="Ungrate">Vocational Certificate</option>
						</select>
					        </div></div>
            <div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="user_id">ID :</label>
                                                <input id="user_id" type="text" class="form-control" name="user_id" value="{{$user->id}}" readonly>
                                                </div></div>
            <div class="form-group">

                                                <div class="col-sm-12">

                                                <label for="GPAX">GPAX :</label>
                                                <input id="GPAX" type="text" class="form-control" name="GPAX" required>
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="schoolname">School :</label>
                                                <input id="schoolname" type="text" class="form-control" name="schoolname" required >
                                                </div></div>
</div>
</div>
<br>
<div class="card border-warning">
<div class="card-header text-white bg-danger">
Academic History
</div>
<div class="card-body">

<div class="container-fluid">
<div class="table-responsive">
<table class="table table-bordered">
<thead id="tpink">
<tr>
<th>Subject</th>
<th>Grade10</th>
<th>Grade11</th>
<th>Grade12</th>
</tr>
</thead>
<tbody>
<tr>
<td>Mathematics</td>
<td><input id="mth10" type="text" class="form-control" name="mth10" ></td>
<td><input id="mth11" type="text" class="form-control" name="mth11" ></td>
<td><input id="mth12" type="text" class="form-control" name="mth12" ></td>
</tr>
<tr>
<td>Physics</td>
<td><input id="phy10" type="text" class="form-control" name="phy10" ></td>
<td><input id="phy11" type="text" class="form-control" name="phy11" ></td>
<td><input id="phy12" type="text" class="form-control" name="phy12" ></td>
</tr>
<tr>
<td>Microbiology</td>
<td><input id="mic10" type="text" class="form-control" name="mic10" ></td>
<td><input id="mic11" type="text" class="form-control" name="mic11" ></td>
<td><input id="mic12" type="text" class="form-control" name="mic12" ></td>
</tr>
<tr>
<td>Chemistry</td>
<td><input id="chm10" type="text" class="form-control" name="chm10" ></td>
<td><input id="chm11" type="text" class="form-control" name="chm11" ></td>
<td><input id="chm12" type="text" class="form-control" name="chm12" ></td>
</tr>
<tr>
<td>English</td>
<td><input id="eng10" type="text" class="form-control" name="eng10" ></td>
<td><input id="eng11" type="text" class="form-control" name="eng11" ></td>
<td><input id="eng12" type="text" class="form-control" name="eng12" ></td>
</tr>
</tbody>
</table>
</div>
</div>
<center>
		<button class="btn btn-primary" id="makesure">Submit</button>
            </center><br><br><hr>

</form>



</div>
</div>
</div>
<script>
$(document).ready(function () {
    $('#makesure').click(function() {
      checked = $("#certlevel").val();

      if(checked == null) {
        swal("Oops!", "You must select certlevel.!", "error");
        //alert()->error('Oops..','You must check at least one checkbox.');
        return false;
      }
      else{
        $("create").submit();
      }
    });
});

</script>

@endsection
@section('footer')
<script src="/js/bootstrap-datepicker.js"></script>
@endsection




