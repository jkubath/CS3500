<?php
// define variables and set to empty values
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$confirmPassword = "";
$firstNameError = "";
$lastNameError = "";
$emailError = "";
$passwordError = "";
$confirmPasswordError = "";
$checkBoxError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first"])) {
    $firstNameError = "First name required";
  } else {
    $firstName = checkInput($_POST["first"]);
    if (!preg_match("/^[a-zA-Z]*$/",$firstName)) {
      $firstNameError = "1";
    }
  }

  if (empty($_POST["last"])) {
    $lastNameError = "1";
  } else {
    $lastName = checkInput($_POST["last"]);
    if (!preg_match("/^[a-zA-Z]*$/",$lastName)) {
      $lastNameError = "1";
    }
  }

  if (empty($_POST["email"])) {
    $emailError = "1";
  } else {
    $email = checkInput($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "1";
    }
  }

  if (empty($_POST["password1"])) {
    $passwordError = "1";
  } else {
    $password = checkInput($_POST["password1"]);
    if (!preg_match("/^[a-zA-Z]\w{8,16}$/",$password)) {
      $passwordError = "1";
    }
  }

  if (empty($_POST["password2"])) {
    $confirmPasswordError = "1";
  } else {
    $confirmPassword = checkInput($_POST["password2"]);
    if (!preg_match("/^[a-zA-Z]\w{8,16}$/", $confirmPassword)) {
      $confirmPasswordError = "1";
    }
if (strcmp($password, $confirmPassword) != 0) {
$confirmPasswordError = "1";
}
  }
}

if(isset($_POST['privacy'])){

}
else {
  $checkBoxError = "1";
}

function checkInput($entry) {
  $entry = trim($entry);
  $entry = stripslashes($entry);
  $entry = htmlspecialchars($entry);
  return $entry;
}

if (strcmp($firstNameError, "") == 0 && strcmp($lastNameError, "") == 0 && strcmp($emailError, "") == 0 && strcmp($passwordError, "") == 0 && strcmp($confirmPasswordError, "") == 0 && strcmp($checkBoxError, "") == 0) {
  echo('<!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Chapter 12</title>

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="chapter12-project02.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
     <script src="bootstrap3_defaultTheme/assets/js/html5shiv.js"></script>
     <script src="bootstrap3_defaultTheme/assets/js/respond.min.js"></script>
   <![endif]-->
  </head>

  <body>


  '); ?>
  <?php include "art-header.inc.php" ?>
  <?php echo('
  <div class="container">



     <div class="row">
        <div class="col-md-3">

           <div class="panel panel-default">
             <div class="panel-heading">Account</div>
             <div class="panel-body">

             <ul class="nav nav-pills nav-stacked">
                 <li><a href="#">Login</a></li>
                 <li class="active"><a href="#">Register</a></li>
                 <li><a href="#">Password Recovery</a></li>
                 <li><a href="#">My Account</a></li>
                 <li><a href="#">Returns</a></li>
                 <li><a href="#">Order History</a></li>
             </ul>


             </div>
           </div>

        </div>
        <div class="col-md-9">

           <div class="page-header">
              <h2>My Account</h2>
              <p>Welcome '); ?><?php echo($_POST['first'] . " " . $_POST['last']);
              echo('</p>
           </div>

           <div class="well">
              <p>'); ?>
              <?php
              echo("Email: <b>" . $_POST['email'] . '</b><br><br>');
              echo("First Name: <b>" . $_POST['first'] . '</b><br><br>');
              echo("Last Name: <b>" . $_POST['last'] . '</b><br><br>');
              echo("Agreed to privacy policy? <b>YES</b>" . '<br>');
              echo ('
              </p>
           </div>
        </div>
     </div>





  </div>  <!-- end container -->
  '); ?>
  <?php include "art-footer.inc.php" ?>
  <?php echo('
   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
   <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
  </body>
  </html>');
}
else {
  header("Location: chapter12-project02.php?firstNameError=" . $firstNameError . "&lastNameError=" . $lastNameError .
    "&emailError=". $emailError ."&passwordError=".$passwordError ."&confirmPasswordError=".
    $confirmPasswordError . "&checkBoxError=".$checkBoxError);
  exit;
}
?>
