<?php
$con = mysqli_connect('localhost','kirei','5554764s','FinalExam');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"FinalExam");
$sql="SELECT * FROM sex ";
$result2 = mysqli_query($con,$sql);
$sql1="SELECT * FROM occupationtype ";
$result = mysqli_query($con,$sql1);
$sql2="SELECT * FROM marital";
$result1 = mysqli_query($con,$sql2);

?>
<html>
<head>
  <!--- basic page needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Stock by CPE 29</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- mobile specific metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS
  ================================================== -->
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/vendor.css">
  <link rel="stylesheet" href="css/main.css">

  <!-- script
  ================================================== -->
  <script src="js/modernizr.js"></script>
  <script src="js/pace.min.js"></script>

  <!-- favicons
  ================================================== -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <style>
    select
      option
      {
        color:black;
      }
      option:first-child
      {
        color:white;
      }

  </style>
</head>
<body>
<!-- contact
================================================== -->
<section id="contact" class="s-contact">

    <div class="overlay"></div>
    <div class="contact__line"></div>

    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Register now</h3>

        </div>
    </div>

    <div class="row contact-content" data-aos="fade-up">

        <div class="contact-primary" style="width:50%"; >

            <h3 class="h6">Form</h3>

            <form   method="post" action="registeraction.php" novalidate="novalidate">
                <fieldset>

              <!--  <div class="form-field">
                    <input name="THFirstname" type="text" id="contactName" placeholder="ชื่อ" value="" minlength="2" required="" aria-required="true" class="full-width">
                </div>
                <div class="form-field">
                    <input name="THLastname" type="text" id="contactName" placeholder="นามสกุล" value="" required="" aria-required="true" class="full-width">
                </div> -->
                <div class="form-field">
                    <input name="FIRSTNAME" type="text" id="contactSubject" placeholder="FIRSTNAME" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="LASTNAME" type="text" id="contactSubject" placeholder="LASTNAME" value="" class="full-width">
                </div>
                <div class="form-field">
                  <select name="Sex">
                    <?php while($row2 = mysqli_fetch_array($result2)) {?>
                     <option value ="<?php echo $row2['SEX']; ?>"><?php echo $row2['SEX']; ?></option>
                     <?php }?>
                  </select>
                </div>
                <div class="form-field">
                    <input name="DOB" type="date" id="contactSubject" placeholder="DOB" value="" class="full-width" style="width:44%;">
                </div>
                <div class="form-field">
                    <input name="IDCARD" type="text" id="contactSubject" placeholder="ID CARD" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="EMAIL" type="email" id="contactSubject" placeholder="EMAIL" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="Address" type="text" id="contactSubject" placeholder="Address" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="ContactNumber" type="text" id="contactSubject" placeholder="ContactNumber" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="National" type="text" id="contactSubject" placeholder="National" value="" class="full-width">
                </div>
                <div class="form-field">
                  <select name="Occupation">
                    <?php while($row = mysqli_fetch_array($result)) {?>
                     <option value ="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                     <?php }?>
                  </select>
                </div>
                <div class="form-field">
                    <input name="Address_Office" type="text" id="eccontactSubject" placeholder="Address Office" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="Income" type="text" id="eccontactSubject" placeholder="Income" value="" class="full-width">
                </div>
                <div class="form-field">
                  <select name="Marital">
                    <?php while($row1 = mysqli_fetch_array($result1)) {?>
                     <option value ="<?php echo $row1['marital']; ?>"><?php echo $row1['marital']; ?></option>
                     <?php }?>
                  </select>
                </div>
                <!--<div class="form-field">
                    <input name="Suitability" type="text" id="contactSubject" placeholder="Suitability" value="" class="full-width">
                </div> -->
                <div class="form-field">
                    <input name="ID" type="text" id="contactSubject" placeholder="ID" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="PASSWORD" type="password" id="contactSubject" placeholder="PASSWORD" value="" class="full-width">
                </div>

                    <button  type="submit" name="submit">submit</button>



                </fieldset>
            </fo
            rm>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</section> <!-- end s-contact -->
</body>
</html>
