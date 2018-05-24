<?php
require_once 'config.php';
$con = $link;
if(isset($_GET['edit']))
{
  $id = $_GET['edit'];
  $sql = mysqli_query($con,"SELECT * FROM customer_info");
  $row = mysqli_fetch_array($sql);
}
?>
<head>
  <style>
  body {
      background-color: #FDEBD0;
  }

  </style>
</head>
<form action = "updateCustomerAction.php" method = "POST">
  <pre>
    <input type = "hidden" name = "id" value = "<?php echo $row[0];?>">
    First Name     : <input type = "text" name ="firstname" value ="<?php echo $row[1];?>"> </br>
    Last Name      : <input type = "text name = "lastname" value = "<?php echo $row[2];?>"> </br>
    Date of Birth  : <input type = "text name = "dob" value = "<?php echo $row[3];?>"> </br>
    Sex            : <input type = "text name = "sex" value = "<?php echo $row[4];?>"></br>
    ID_Card        : <input type = "text name = "id_card" value = "<?php echo $row[5];?>"></br>
    National       : <input type = "text name = "national" value = "<?php echo $row[6];?>"></br>
    Email          : <input type = "text name = "email" value = "<?php echo $row[7];?>"></br>
    Contact Number : <input type = "text name = "contact_number" value = "<?php echo $row[8];?>"></br>
    Address        : <input type = "text name = "address" value = "<?php echo $row[9];?>"></br>
    Occupation     : <input type = "text name = "occupation" value = "<?php echo $row[10];?>"></br>
    Address Office : <input type = "text name = "address_office" value = "<?php echo $row[11];?>"></br>
    Marital        : <input type = "text name = "marital" value = "<?php echo $row[12];?>"></br>
    Suitability    : <input type = "text name = "suitability" value = "<?php echo $row[13];?>"></br>
    Income         : <input type = "text name = "Income" value = "<?php echo $row[14];?>"></br>
</pre>
<input type = "submit" value = "Update">
</form>
