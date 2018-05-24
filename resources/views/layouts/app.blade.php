<?php
use App\StudentInfo;
$recentUser = Auth::user();
$user = StudentInfo::where('student_id','=',$recentUser->username)->first();

if($recentUser->role != "4"){
     if($user === NULL){
     header("Location: https://dev.bosscpe30.info/regis/");
     return redirect()->route('regis');
     }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CRS - @yield('title', 'Page')</title>
<link rel="icon" type="image/png" href="/img/logo-cpe.png"/>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/web.css">
<link rel="stylesheet" href="/css/sticky2.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #c58ec3;">
<div class="container-fluid">
  <a class="navbar-brand" href="/"><img src="/img/cpe2.png" style="width:265px; height:41px; "></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/showInfo">Manage Freshmen</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Education
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/tools/data-importer">Add Subject</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/enroll/viewall">Check Course</a>
          <a class="dropdown-item" href="/">Enrollment</a>
          <a class="dropdown-item" href="/">GradeResult</a>
        </div>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Activity
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/activity/create">Create Activity</a>
          <div class="dropdown-divider"></div>
	  <a class="dropdown-item" href="/showActivity">List Activity</a>
          <a class="dropdown-item" href="/activity/approve">Permit Activity</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           @if($recentUser->role == 4)
	   Administrator
           @else
	   {{ $user['student_id'] }}
	   @endif
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/#">Edit Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>

<div class="container">
   <div class="row">
   <div class="col-sm-12">
   
   @if (trim($__env->yieldContent('breadcrumb')))
                        <?php $disable = true; ?>
                    @else
                        <?php $disable = false;?>
                    @endif
                    @include('components.breadcrumb', ['disable' => $disable])

   </div>
   </div>
   
   <div class="row">
   <div class="col-12">
   <div class="card">
	@yield('content')
   </div>
   </div>
   </div>
<div class="push"></div>
</div>
@include('components.footer')
</body>
</html>
