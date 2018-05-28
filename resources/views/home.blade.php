@extends('layouts.app')

@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-12">
		    @if (session()->has('success'))
		    <script>
			swal("{!! session('success') !!}","Press Ok to Continue","success" );
		    </script>

		    @endif
		    <div class="card-header text-white bg-info">
        		<i class="fa fa-comments" aria-hidden="true"></i> Greeting
    		    </div>
		    @guest
		    <div class="card-body"><center> Please login before using our website! </center></div>
		    @else
		    <div class="card-body"><center>
                    You are logged in! </center></div>
		    @endguest
        </div>
    </div>
</div>
<br />
<div class="row">

<div class="col-sm-4">
<div class="card">
<div class="card-header text-white bg-success">
<i class="fa fa-book" aria-hidden="true"></i> Analysis Report
</div>
  <div class="card-body">
	<a href="/analysis">** Official Done **</a>
  </div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-header text-white bg-danger">
<i class="fa fa-bullhorn" aria-hidden="true"></i> Announcement
</div>
  <div class="card-body">
	We need to sent this project on 28th May 2018
  </div>
</div>
</div>

<div class="col-sm-4">
<div class="card">
<div class="card-header text-white bg-info">
<i class="fa fa-phone-square" aria-hidden="true"></i> Contact Admin
</div>
  <div class="card-body">
	K'Boss 091-743-58xx
  </div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-4">
<div class="card">
<div class="card-header text-white bg-primary">
<i class="fa fa-list" aria-hidden="true"></i> Course List
</div>
  <div class="card-body">
        It's showing the course that open in this semester.<br>
        Link : <a href="/enroll/viewall">Click Here</a>
  </div>
</div>
</div>
<div class="col-sm-1"></div>
<div class="col-sm-4">
<div class="card">
<div class="card-header text-white bg-warning">
<i class="fa fa-plus-square" aria-hidden="true"></i> Create Activity
</div>
  <div class="card-body">
	For Student Only!!<br>
        Link : <a href="/activity/create">Click Here!</a>
  </div>
</div>
</div>

</div>
<div class="push"></div>
@endsection

