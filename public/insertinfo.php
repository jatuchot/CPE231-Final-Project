<html>
<head>
<meta charset="UTF-8">
<title>CPE231 - Done Registration</title>
<!-- JAVASCRIPT FOR SWEETALERT -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1); /* use for alert when php syntax error */
$con=mysqli_connect("localhost","kirei","5554764s","project");
mysqli_set_charset($con,"utf8");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$created_date = date("Y-m-d H:i:s");
$user = mysqli_real_escape_string($con, $_POST['sid']);
$identification_number= mysqli_real_escape_string($con, $_POST['identification_number']);
$id = mysqli_real_escape_string($con, $_POST['id']);
$Firstname = mysqli_real_escape_string($con, $_POST['Firstname']);
$Lastname = mysqli_real_escape_string($con,$_POST['Lastname']);
$FirstnameTH = mysqli_real_escape_string($con,$_POST['FirstnameTH']);
$LastnameTH = mysqli_real_escape_string($con,$_POST['LastnameTH']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$Personal_Email = mysqli_real_escape_string($con,$_POST['Personal_Email']);
$Kmutt_Email = mysqli_real_escape_string($con,$_POST['Kmutt_Email']);
$phone_num = mysqli_real_escape_string($con,$_POST['phone_num']);
$DOB = mysqli_real_escape_string($con,$_POST['DOB']);

$sql="INSERT INTO student_info (Identification_Number,user_id,student_id,Firstname,Lastname,FirstnameTH,LastnameTH,gender,address, Personal_Email,Kmutt_Email,phone_num,DOB,created_at,updated_at) VALUES ('$identification_number','$id','$user','$Firstname','$Lastname','$FirstnameTH','$LastnameTH','$gender','$address','$Personal_Email','$Kmutt_Email','$phone_num','$DOB','$created_date','$created_date')";
if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_error($con));
}
mysqli_close($con);

?>
<script type="text/javascript">
      swal({
          title: "Your record has been saved",
	  text:  "Pless OK to Continue",
          icon: "success",
          closeOnClickOutside: false,
          closeOnEsc: false,

        }).then(resp => {
          window.location.href = "/school/info";
        })
    </script>
</body>
</html>
