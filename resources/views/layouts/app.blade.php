<?php
use App\StudentInfo;
$curUser = Auth::user();
$user = StudentInfo::where('user_id','=',$curUser->id)->first();
$url = 'https://dev.bosscpe30.info/regis'; 
if($user === null){
	echo "No data in database <br>";
	echo "Please Logout and try to login with account that have done registed <br><br>";
	echo url("/logout");
	sleep(2);
	header('Location: https://dev.bosscpe30.info/regis');
	return redirect()->route('regis');
}

?>
<!DOCTYPE html> 
<html> 
<head>
  <!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title', 'CPE231') - CPE231|CPE-Student Registration</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="/css/sidebar2.css" rel="stylesheet" >
   <link href="/css/circle-profile.css" rel="stylesheet">
   <link href="/css/2bapp_back.css" rel="stylesheet">
   <link href="/css/sticky_back.css" rel="stylesheet">
   <link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet">
   <link type="text/css" rel="stylesheet" href="/css/table.css">
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
   <style> 
        body{
		background : #fee9e9;
		background-image: url(/img/bg-body-right.png),url(/img/bg-body-left.png);
		background-repeat: no-repeat,no-repeat;
		background-position: 100% 0,0,50%;
	}
        #header{
		font-size: 17px;
    		font-family: cloud;
   		color : #000;
	        background-color: #a8eeff;
	}
	.fa-star{
	animation: spin 2s linear infinite;
	}

	@-webkit-keyframes spin {
  	0% { -webkit-transform: rotate(0deg); }
  	100% { -webkit-transform: rotate(360deg); }
	}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  #title{
    font-size: 20px;
    font-family: cloud;
    background-color: #c58ec3;
    color: #fff;
  }
  #count{
    font-size: 17px;
    font-family: cloud;
  }
  .btn-pink{
    background-color: #c58ec3;
    color: #fff;
    font-size: 18px;
    font-family: cloud;
    transition: 0.2s;
  }
  .btn-pink:hover{
    background-color: #f4c6f4;
    color: #000;
    font-size: 18px;
    font-family: cloud;
  }
  .desc{
    font-family: cloud;
    font-size: 16px;
  }
</style> 
<script type="text/javascript">
	var APP_URL = {!! json_encode(url('/')) !!}; 
</script> 
</head> 
<body> 
<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><a href="/">CRS : CPE Registration SYSTEM by &#x1F407;</a></h3>
                </div>
		<div class="circle-img">
		@guest
		<div class="ratio img-responsive img-circle" style="background-image: url('/img/user.png');"></div>
		@else
		<div class="ratio img-responsive img-circle" style="background-image: url('/img/miko.jpg');"></div>
		@endguest
		</div>
            <ul class="list-unstyled components">
                <li class="active">
			@guest
			<p>Hello :: Guest</p>
			<li><a href="{{url('/login')}}"><i class="fa fa-home"></i> Login</a></li>
			@else
			<p>Hello :: {{ $curUser->name }}  
			@if($curUser->role == "2")
			 ,2nd-Year
			@elseif($curUser->role == "1")
			 ,1st-Year
			@elseif($curUser->role == "3")
			 ,3nd-Year
			@endif

			( {{ $user->Firstname }} {{ $user->Lastname }} )</p>
			<li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="{{ url('/activity/create') }}"><i class="fa fa-calendar-check-o"></i> Create Activity</a></li>
            <li><a href="{{ url('/activity/approve') }}"> <i class="fa fa-comments"></i> Permit Activity</a></li>
            <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit Profile </a></li>
			<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
			@endguest
	    </li></ul>
            </nav>
            <!-- Page Content Holder --> <div id="main-page" class="col-sm-12">
            <div id="content" color="#fee9e9">
            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
	    
                    @if (trim($__env->yieldContent('breadcrumb')))
                        <?php $disable = true; ?>
                    @else
                        <?php $disable = false;?>
                    @endif
                    @include('components.breadcrumb', ['disable' => $disable])
                    <div id="main-content-container">
			@yield('content')

		<br>
		@include('components.footer')
            </div>
        </div> 
	</div>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script src="/js/app.js" type="text/javascript"> </script>
    	 @yield('footer')
         <script type="text/javascript">
             $(document).ready(function () {
	         $('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
	 });
         </script>
  
</body> 
</html>
