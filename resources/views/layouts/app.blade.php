<?php
use App\StudentInfo;
$recentUser = Auth::user();
$user = StudentInfo::where('student_id','=',$recentUser->username)->first();
$aj = App\TeacherInfo::where('user_id','=',$recentUser->id)->first();

if($recentUser->role == 1 || $recentUser->role == 2 || $recentUser->role == 3){
     if($user === NULL){
     echo "Waiting for redirect..";
     header("refresh:1; url=/regis");
     return redirect()->route('regis');
     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
<title>CRS - @yield('title', 'Page')</title>
<link rel="icon" type="image/png" href="/img/logo-cpe.png"/>
<link rel="stylesheet" href="/css/material.min.css">
<link href="/css/sidebar2.css" rel="stylesheet" >
<link href="/css/web.css" rel="stylesheet">
<link href="/css/circle-profile.css" rel="stylesheet">
<link href="/css/2bapp_back.css" rel="stylesheet">
<link href="/css/gly.css" rel="stylesheet">
<link rel="stylesheet" href="/css/web.css">
<link rel="stylesheet" href="/css/sticky2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/material.min.js"></script>
<script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>
<style>
body{
	background : #fee9e9;
	background-image: url(/img/bg-body-right.png),url(/img/bg-body-left.png);
	background-repeat: no-repeat,no-repeat;
	background-position: 100% 0,0,50%;
}
</style>

</head>


<body>
<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><img src="/img/cpe2.png" width="100%" class="sidebarImg"></h3>
                    <strong><img src="/img/logo-cpe.png" width="50px" class="showImg"></strong>
                </div>
		<ul class="list-unstyled profileimg">
		<div class="img-circle">
		@if($recentUser->role != '4' && $recentUser->role != '5')
		@if($user->image_filename != '')
		<div class="ratio img-responsive img-circle" style="background-image: url('/img/profile/{{ $user->image_filename }}');"></div>
	        @else
		<div class="ratio img-responsive img-circle" style="background-image: url('/img/user1.png');"></div>
		@endif
		@elseif($recentUser->role == '5')
		<div class="ratio img-responsive img-circle" style="background-image: url('/img/staff/{{ $aj->image_filename }}');"></div>
		@else
		<div class="ratio img-responsive img-circle" style="background-image: url('/img/miori.jpg');"></div>
		@endif
		</div>
		</ul>
		<ul class="list-unstyled text">
		@if($recentUser->role != '4' && $recentUser->role != '5')
		@if($user->gender == 'M')
		<i class="fa fa-users" aria-hidden="true"></i> Mr.{{ $user->Firstname }} {{ $user->Lastname }}
		@elseif($user->gender == 'F')
		<i class="fa fa-users" aria-hidden="true"></i> Ms.{{ $user->Firstname }} {{ $user->Lastname }}
		@endif
		@elseif($recentUser->role == '5')
		<i class="fa fa-users" aria-hidden="true"></i> Aj.{{ $aj->Firstname }} {{ $aj->Lastname }}
		@elseif($recentUser->role == '4')
		 <i class="fa fa-user-circle" aria-hidden="true"></i> Administration
		@endif
		</ul>

                <ul class="list-unstyled components">
                    <li>
                        <a href="/">
                            <i class="fa fa-tachometer"></i>
                           Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/showInfo">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            List Student
                        </a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-laptop"></i>
                            Enrollment
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="/enroll/viewall">Course List</a></li>
                            <li><a href="/enroll/regis">Regis Course</a></li>
			    @if($recentUser->role == '4' || $recentUser->role == '5')
			    <li><a href="/tools/data-importer">Add Course</a></li>
			    @endif
                        </ul>
                    </li>
		    <li>
			<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-laptop"></i>
                            Activity
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
                            @if($recentUser->role == '1' || $recentUser->role == '2' || $recentUser->role == '3')
			    <li><a href="/activity/create">Create Activity</a></li>
			    <li><a href="/activity/list">Check Hours of Activity</a></li>
			    @endif
			    <li><a href="/showActivity">List Activity</a></li>
			    @if($recentUser->role == '4' || $recentUser->role == '5')
                            <li><a href="/activity/approve">Permit Activity</a></li>
			    <li><a href="/tools/activity">Giving Hours</a></li>
			    @endif
                        </ul>
                    </li>
		    <li>
                        <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">
                            <i class="fa fa-table"></i>
                            Grading System
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu2">
                            @if($recentUser->role == '1' || $recentUser->role == '2' || $recentUser->role == '3')
                            <li><a href="/grade/viewResult">Grade Result</a></li>
                            @endif
                            @if($recentUser->role == '4' || $recentUser->role == '5')
                            <li><a href="/grade/gradeassign">Assign Grade</a></li>
                            @endif
                        </ul>
                    </li>

                    <li> 
			@if($recentUser->role == '1' || $recentUser->role == '2' || $recentUser->role == '3')
                        <a href="/edit">
                            <i class="glyphicon glyphicon-link"></i>
                            Edit Profile
                        </a>
			@else
			<a href="/edit/instructor">
                            <i class="glyphicon glyphicon-link"></i>
                            Edit Profile
                        </a>
			@endif
                    </li>
		    <li>
                        <a href="/analysis">
                            <i class="fa fa-book"></i>
                            Analysis Report
                        </a>
                    </li>


                </ul>
		<ul class="list-unstyled components2">
		<li><center>
                        <a href="/logout">
                            <i class="fa fa-sign-out"></i>
                            Logout
                        </a></center>
                    </li>

		</ul>
            </nav>

            <!-- Page Content Holder -->
	    <div id="main-page">
	    <div id="content">
		<div class="container-fiuld col-sm-12">
			<button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                        </button>
			<br>
			@if (trim($__env->yieldContent('breadcrumb')))
                        	<?php $disable = true; ?>
                    	@else
                        	<?php $disable = false;?>
                    	@endif
                    	@include('components.breadcrumb', ['disable' => $disable])
			@yield('content')
			<br>
		</div>
                </div>
	    </div>
	<div class="push"></div>
        </div>
<script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
@include('sweetalert::alert')
@include('components.footer')
</body>
</html>
