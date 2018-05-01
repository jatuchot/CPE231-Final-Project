<?php

$conn = new mysqli("localhost", "root", "5554764s", "project");
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " .
mysqli_connect_error();
}
mysqli_query($conn,"UPDATE activities_info SET status = 1  WHERE id='".$_GET['ID']."'");
mysqli_close($conn);

echo("Done Update Status");
?>
