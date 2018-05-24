<?php
	session_start();
	$db = mysqli_connect('localhost', 'kirei', '5554764s', 'FinalExam');
	// initialize variables
	  $THFirstname = "";
    $THLastname = "";
    $FIRSTNAME = "";
    $LASTNAME  = "";
    $DOB = "";
    $IDCARD   = "";
    $EMAIL   = "";
    $Address     ="";
    $ContactNumber      ="";
    $National   = "";
    $Occupation   = "";
    $Address_Office   = "";
    $Marital   = "";
    $Suitability = "";
    $ID   = "";
    $PASSWORD   = "";
    $Sex ="";
		$Income ="";

	$update = false;

	if (isset($_POST['submit'])) {
        //$THFirstname  = $_POST['THFirstname'];
        //$THLastname = $_POST['THLastname'];
        $FIRSTNAME = $_POST['FIRSTNAME'];
        $LASTNAME  = $_POST['LASTNAME'];
        $DOB = $_POST['DOB'];
        $IDCARD = $_POST['IDCARD'];
        $EMAIL   = $_POST['EMAIL'];
        $Address    = $_POST['Address'];
        $ContactNumber     = $_POST['ContactNumber'];
        $National   = $_POST['National'];
        $Occupation   = $_POST['Occupation'];
        $Address_Office   = $_POST['Address_Office'];
        $Marital   = $_POST['Marital'];
        $Suitability   = $_POST['Suitability'];
        $ID   = $_POST['ID'];
        $PASSWORD   = $_POST['PASSWORD'];
        $Sex   = $_POST['Sex'];
	$Income = $_POST['Income'];
	$sq1 = "INSERT INTO customer_info (`c_first_Name`,`c_last_Name`,`c_date_of_Birth`,`c_id_Card`,`c_email`,`c_contact_Number`,`c_address`,`national`,`occupation`,`address_office`,`marital`,`c_sex`,`Income`)VALUES ('$FIRSTNAME','$LASTNAME','$DOB','$IDCARD','$EMAIL','$ContactNumber','$Address','$National','$Occupation','$Address_Office','$Marital','$Sex','$Income')";
	mysqli_query($db,$sq1);
	mysqli_close($db);
	
	$_SESSION['ID'] = $ID;
	$_SESSION['PASSWORD'] = $PASSWORD;
	$_SESSION['EMAIL'] = $EMAIL;
        header('location: getUserID.php');
	}
  ?>
