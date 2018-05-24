<?php
session_start();
$servername = "localhost";
$username = "kirei";
$password = "5554764s";
$dbname = "FinalExam";
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->exec("set names utf8");

$email = $_SESSION['EMAIL'];
$id = $_SESSION['ID'];
$pass = $_SESSION['PASSWORD'];
$userID = $pdo->prepare("SELECT User_ID FROM customer_info WHERE c_email = ?");
$emailCheck = array($email);
$userID->execute($emailCheck);

while($test = $userID->fetch(PDO::FETCH_ASSOC)){
    echo "USERID : " . $test['User_ID'];
    $user = $test['User_ID'];
}
//echo $user;

$gg = $pdo->prepare("INSERT INTO account(ID,Password,User_ID) VALUES (?, ?, ?)");
$getInfo = array($id,$pass,$user);
$gg->execute($getInfo);
echo "DONE";
header('location: LOGIN.php'); 
?>
