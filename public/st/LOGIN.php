<?php
$con = mysqli_connect('localhost','kirei','5554764s','FinalExam');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"stock trading");
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["id"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["id"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT ID,Password FROM account WHERE ID = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password == $hashed_password){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['id'] = $username;

                            header("location: loginhomepage.php?id=$username");
                           //header("location: index.php?username=$username");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}


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
            <h3 class="subhead">Login</h3>

        </div>
    </div>

    <div class="row contact-content" data-aos="fade-up">

        <div class="contact-primary" style="width:50%"; >

            <h3 class="h6">Form</h3>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate="novalidate">
                <fieldset>
                <div class="form-field">
                    <input name="id" type="text" id="contactSubject" placeholder="ID" value="" class="full-width">
                </div>
                <div class="form-field">
                    <input name="password" type="password" id="contactSubject" placeholder="PASSWORD" value="" class="full-width">
                </div>
                <div class="form-field">
                    <button class="full-width btn--primary">Submit</button>
                    <div class="submit-loader">
                        <div class="text-loader">Sending...</div>
                        <div class="s-loader">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                    </div>
                </div>

                </fieldset>
            </form>

            <!-- contact-warning -->
            <div class="message-warning">
                Something went wrong. Please try again.
            </div>

            <!-- contact-success -->
            <div class="message-success">
                Your message was sent, thank you!<br>
            </div>

        </div> <!-- end contact-primary -->

        <div class="contact-secondary">
            <div class="contact-info">



            </div> <!-- end contact-info -->
        </div> <!-- end contact-secondary -->

    </div> <!-- end contact-content -->
    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</section> <!-- end s-contact -->
</body>
</html>
