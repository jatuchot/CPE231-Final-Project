<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');


$conn = mysqli_connect("localhost", "kirei", "5554764s", "project");
mysqli_set_charset($conn,"utf8");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result=$conn->query("SELECT id, identification_number, Firstname, Lastname, FirstnameTH, LastnameTH, gender, address, Personal_Email, kmutt_email, self_telephone_no, DOB FROM student_info");
echo("pass");
$outp = "[";
while($rs=$result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"ID":"'  . $rs["id"] . '",';
    $outp .= '"identification_Number":"'   . $rs["identification_number"]        . '",';
    $outp .= '"Firstname":"'   . $rs["Firstname"]        . '",';
    $outp .= '"Lastname":"'   . $rs["Lastname"]     . '",'; 
    $outp .= '"FirstnameTH":"'   . $rs["FirstnameTH"]     .'",';
    $outp .= '"LastnameTH":"'   . $rs["LastnameTH"]     .'",';
    $outp .= '"gender":"'   . $rs["gender"]     .'",';
    $outp .= '"address":"'   . $rs["address"]     .'",';
    $outp .= '"Personal_Email":"'   . $rs["Personal_Email"]     .'",';
    $outp .= '"Kmutt_Email":"'   . $rs["kmutt_email"]     .'",';
    $outp .= '"phone_num":"'   . $rs["self_telephone_no"]     .'",';
    $outp .= '"DOB":"'   . $rs["DOB"]     .'"}';
}
$outp .="]";
$conn->close();

echo($outp);

?>
