<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head >
<title>Stock by CPE 29</title>
<meta charset="utf-8">
<style>
body {margin:0;}
body {
    background-color: #76D7C4;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #444;
    position: fixed;
    top: 0;
    width: 100%;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #F4D03F;
}
</style>
</head>
<body>

<ul>
  <li class="active"><a href="loginhomepage.php?id=<?php echo $_GET['id']?>">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="transaction.html">transaction</a></li>
  <li><a href="#about">อันนี้ก้ด้วย</a></li>
  <li><a href="#about">อันนี้อีกอันไอสัสเอ้ยยย</a></li>
  <li style="float:right"><a href="logout.php" class="btn btn-danger">Sign Out</a></li>

  <li style="float:right"><a href="edituser.php" class="btn btn-danger">edit</a></li>
  <li style="float:right"><a href="profile.php?id=<?php echo $_GET['id']?> " class="btn btn-danger"><?php echo $_GET['id'];?></a></li>
  <?php// } ?>
  <meta name="description" content="">
  <meta name="author" content="">

</ul>

</body>
</html>
