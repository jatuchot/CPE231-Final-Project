<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=email], input[type=text], input[type=password], input[type=number], select{
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=email]:focus,input[type=text]:focus, input[type=password]:focus, input[type=number]:focus ,select:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>


<form method="POST" action="{{ route('register') }}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">                    
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
	
      <label for="name"><b>Username</b></label>
      <input id="username" type="number" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Enter StudentID" required autofocus>

      <label for="email"><b>Email</b></label>
      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>

      <label for="role"><b>Year</b></label>
      <select id="role" name="role" value="{{ old('role') }}">
	  <option value="">Please Choose One</option>
          <option value="1">First Year Student</option>
          <option value="2">Second Year Student</option>
          <option value="3">Third Year Student</option>
        </select>

      <label for="psw"><b>Password</b></label>
      <input id="password" type="password" placeholder="Password" {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input id="password-confirm" type="password" placeholder="Repeat Password" class="form-control" name="password_confirmation" required>

      

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn" onclick="window.location.href='/login'">Cancel</button>
	<button type="submit" class="signupbtn">{{ __('Register') }}</button>

      </div>
    </div>
  </form>
</div>


</body>
</html>

