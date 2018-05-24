<?php
session_start();
var_dump($_POST);
//echo $_SESSION('id');

$con=mysqli_connect("localhost","root","chris82567","stock trading");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$Transaction_Number = mysqli_real_escape_string($con,$_POST['Transaction_Number']);


//$Account_ID = mysqli_query($con,"SELECT Account_ID
//								 FROM account
//								 WHERE User_ID = 37")
//						         or die("Error : ".mysqli_error($con));

//$Account_ID = mysqli_real_escape_string($con, $_POST['Account_ID']);
$T_Date = mysqli_real_escape_string($con, $_POST['T_Date']);

$Tranfer_Account = mysqli_real_escape_string($con, $_POST['Tranfer_Account']);
$Receive_Account = mysqli_real_escape_string($con, $_POST['Receive_Account']);
$Transaction_Type = mysqli_real_escape_string($con, $_POST['Transaction_Type']);
$Transaction_Amount = mysqli_real_escape_string($con, $_POST['Transaction_Amount']);
$Fee = mysqli_real_escape_string($con, $_POST['Fee']);
$T_Status = mysqli_real_escape_string($con, $_POST['T_Status']);



$sql= "INSERT INTO transaction(T_Date,Tranfer_Account,Receive_Account,Transaction_Type,Transaction_Amount,Fee,T_Status)

VALUES ('$T_Date','$Tranfer_Account','$Receive_Account','$Transaction_Type','$Transaction_Amount','$Fee','$T_Status')";

if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_error($con));

}
header('location: transaction.html');
mysqli_close($con);
?>
