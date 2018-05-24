<?php
include('config.php');
session_start();

 ?>
 <html>
 <head>
   <style>
   body {
       background-color: #FADBD8;
   }
   </style>
 </head>
 <body>
 <?php

$id = $_GET['id'];

$result =  mysqli_query($link,"SELECT User_ID FROM account WHERE ID Like '$id' ");
$result3 = mysqli_query($link,"SELECT ID,Password FROM account WHERE ID Like '$id' ");
while($data2 = mysqli_fetch_array($result) )
  {
    $User_ID = $data2['User_ID'];
    $result2 = mysqli_query($link,"SELECT * FROM customer_info WHERE User_ID Like '$User_ID' ");
  }

while($data = mysqli_fetch_array($result2)){

  echo "<h1>Your Profile</h1>";

  echo "Firstname :";
  echo $data['c_first_Name']."<br><br>";
  echo "Lastname :";
  echo $data['c_last_Name']."<br><br>";
  echo "Date :";
  echo $data['c_date_of_Birth']."<br><br>";
  echo "ID card :";
  echo $data['c_id_Card']."<br><br>";
  echo "Phone Number :";
  echo $data['c_contact_Number']."<br><br>";
  echo "Address :";
  echo $data['c_address']."<br><br>";
  echo "National :";
  echo $data['national']."<br><br>";
  echo "Occupation :";
  echo $data['occupation']."<br><br>";
  echo "Address office :";
  echo $data['address_office']."<br><br>";
  echo "Status :";
  echo $data['marital']."<br><br>";
  while($data3 = mysqli_fetch_array($result3)){
        echo "Username :";
        echo $data3['ID']."<br><br>";
        echo "Password :";
        echo $data3['Password']."<br><br>";
      }
  echo "Sex :";
  echo $data['c_sex'];

}
 ?>
</body>
</html>
