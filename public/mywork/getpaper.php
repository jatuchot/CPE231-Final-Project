<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "kirei", "5554764s", "cpe231");

$result = $conn->query("SELECT ID, Username,school_name, Cert_level, GPAX FROM school_info;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"ID":"'  . $rs["ID"] . '",';
    $outp .= '"Username":"'   . $rs["Username"]        . '",';
    $outp .= '"school_name":"'   . $rs["school_name"]        . '",';
    $outp .= '"Cert_level":"'. $rs["Cert_level"]     . '",';
    $outp .= '"GPAX":"'. $rs["GPAX"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>
