<?php

$conn = new mysqli("localhost", "kirei", "5554764s", "cpe231");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
mysqli_query($conn,"DELETE FROM student_info WHERE ID='".$_GET['ID']."'");
mysqli_close($conn);

echo("Delete data");
?>
