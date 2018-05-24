<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>CPE231 :: CPERegistration-LoginPage</title>
   <link href="/css/sticky_back.css" rel="stylesheet">
    <link href="/css/login2_back.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<style>
.links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }


hr {
  border-color: #DDD; } 
.push{
	margin-top: 150px;
}


@media(max-width:768px){
.wrapper{
            min-height: 0;
	    width: 90%;
}
.push{
	margin-top:60px;
}
}
@media(max-width:736px){
.wrapper{
            min-height: 0;
            width: 90%;
}
.push{
	margin-top: 55px;
}
}
@media(max-width:640px){
.wrapper{
            min-height: 0;
            width: 90%;
}
.push{
        margin-top: 25px;
}

}
@media(max-width:568px){
.wrapper{
            min-height: 0;
            width: 90%;
}
.push{
	margin-top:-10 px;
}
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


</style>
<div class="push">
<center><img src="/img/logo-cpe.png" class="img img-responsive" width="150"></center><br>
<div class="wrapper">
<form class="login" id="login2" method="POST" action="{{ url('/login') }}">
 {!! csrf_field() !!}
    <p class="title" style="text-align: left;font-family: cloud;">
      <i class="fa fa-fw fa-star"></i>&nbsp;Sign In
    </p>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"></div>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="StudentID" autofocus required/>
      <i class="fa fa-user"></i>
      <input type="password" name="password" placeholder="Password">
      <i class="fa fa-key"></i>

    <button>
      <i class="spinner"></i>
      <span class="state" style="font-family: cloud;font-size: 16px;"><i class="fa fa-fw fa-check"></i>&nbsp;Submit</span>
    </button>
  
        </form>

  @if ($errors->has('username'))
		<script type="text/javascript">
		    var print;
		    print = "{{ $errors->first('username') }}"
                    swal("Oops..",print,"error");
  		</script>
  @endif

        <!-- Remind Passowrd -->

    </div>
</div>
<br>
<br>
<hr width="75%">
<center><p>Forget Password? Contact Admin @ ServerRoom</p>
<div class="links">
<a href="{{ route('login') }}">Login</a>
<a href="{{ route('register') }}">Register</a>
</div>
</div>
</center>
</body>
</html>


