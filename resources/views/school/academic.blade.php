<?php
$i = 0;
use App\StudentInfo;
use App\AcademicHistory;


$curUser = Auth::user();
$rUser = StudentInfo::where('user_id','=',$curUser->id)->first();
$user = App\SchoolInfo::where('user_id','=',$rUser->id)->first();
?>
@extends('layouts.app3')
@section('title','Activity Portal')

@section('content')
<div class="card">
<div class="card-header">
   @include('components.title', [
	"title" => "School Academic",
	"desc" => "Use for submit activity and delete activity"
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
<div class="card-body">
				<form class="form-horizontal" id="create" method="post" action="/school/academic/{{ $user->id }}" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="form-group">
						<div class="col-sm-12">

              <div class="form-group">

<!--                                                <div class="col-sm-12">

                                                <label for="user_id">USER ID :</label> -->
                                                <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{$user->id}}" readonly>
                                                <!-- </div></div> -->
						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy10">GPA of Grade 10 Physic :</label>
                                                <input id="phy10" type="text" class="form-control" name="phy10" >
                                                </div></div>
						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy11">GPA of Grade 11 Physic :</label>
                                                <input id="phy11" type="text" class="form-control" name="phy11" >
                                                </div></div>
						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="phy12">GPA of Grade 12 Physic :</label>
                                                <input id="phy12" type="text" class="form-control" name="phy12" >
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mth10">GPA of Grade 10 Math :</label>
                                                <input id="mth10" type="number" class="form-control" name="mth10" >
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mth11">GPA of Grade 11 Math :</label>
                                                <input id="mth11" type="text" class="form-control" name="mth11" >
                                                </div></div>

						<div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mth12">GPA of Grade 12 Math :</label>
                                                <input id="mth12" type="text" class="form-control" name="mth12" >
                                                </div></div>
            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mic10">GPA of Grade 10 BIO :</label>
                                                <input id="mic10" type="number" class="form-control" name="mic10" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mic11">GPA of Grade 11 BIO :</label>
                                                <input id="mic11" type="text" class="form-control" name="mic11" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="mic12">GPA of Grade 12 BIO :</label>
                                                <input id="mic12" type="text" class="form-control" name="mic12" >
                                                </div></div>
            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="chm10">GPA of Grade 10 Chemistry :</label>
                                                <input id="chm10" type="number" class="form-control" name="chm10" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="chm11">GPA of Grade 11 Chemistry :</label>
                                                <input id="chm11" type="text" class="form-control" name="chm11" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="chm12">GPA of Grade 12 Chemistry :</label>
                                                <input id="chm12" type="text" class="form-control" name="chm12" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="eng10">GPA of Grade 10 English :</label>
                                                <input id="eng10" type="number" class="form-control" name="eng10" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="eng11">GPA of Grade 11 English :</label>
                                                <input id="eng11" type="text" class="form-control" name="eng11" >
                                                </div></div>

            <div class="form-group">
                                                <div class="col-sm-12">

                                                <label for="eng12">GPA of Grade 12 English :</label>
                                                <input id="eng12" type="text" class="form-control" name="eng12" >
                                                </div></div>
            <center>
            <button type="submit" class="btn btn-primary">Save</button>
            </center><br><br><hr>
						
</div>
</div>
@endsection
@section('footer')
@endsection

