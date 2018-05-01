<html>
<head>
<meta charset="UTF-8">
<title>LAB7</title>
<!-- JAVASCRIPT FOR SWEETALERT -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
ini_set('display_errors', 1); /* use for alert when php syntax error */
$host = "localhost";
$db = "cpe231";
$usr = "kirei";
$password = "5554764s";

//Connect to Database BY PDO 
$pdo = new PDO("mysql:host=$host;dbname=$db","$usr","$password");

if(isset($_POST['username'])){
$sq = "INSERT INTO school_info (Username,school_name,Cert_level,GPAX) VALUES (:username,:school,:cert,:gpax)";
$sql = $pdo->prepare($sq);
$sql->bindParam(':username',$_POST["username"],PDO::PARAM_STR);
$sql->bindParam(':school',$_POST["test"],PDO::PARAM_STR);
$sql->bindParam(':cert',$_POST["cert"],PDO::PARAM_STR);
$sql->bindParam(':gpax',$_POST["gpax"],PDO::PARAM_STR);
$sql->execute();
// Print Result from $_POST['']
echo "( " . $_POST["username"] .", " .$_POST["test"] .", ". $_POST["cert"].", " . $_POST["gpax"] . " )";

?>
<script type="text/javascript">
      swal({
          title: "บันทึกข้อมูลสำเร็จ",
          text: "กด OK เพิ่อกลับไปหน้ากรอกข้อมูล",
          icon: "success",
          closeOnClickOutside: false,
          closeOnEsc: false,

        }).then(resp => {
          window.location.href = "./index.html";
        })
    </script>
<?php
}
?>
</body>
</html>

