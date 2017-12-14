

<!DOCTYPE html>
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



<?php include 'art-header.inc.php' ?>

<div class="container">



   <div class="row">
      <div class="col-md-3">

<div class="panel panel-default">
  <div class="panel-heading">Account</div>
  <div class="panel-body">

  <ul class="nav nav-pills nav-stacked">
  <li><a href="#">Login</a></li>
  <li class="active"><a href="#">Register</a></li>

</ul>


  </div>
</div>
      </div>
      <div class="col-md-9">


<form role="form" id="mainForm" class="form-horizontal" action="art-form-process.php" method="post">
   <div class="page-header">
      <h2>Register Account</h2>
      <p>If you already have an account with us, please login at the login page.</p>
   </div>


     <div class="form-group">
       <label for="first" class="col-md-3 control-label">First Name</label>
       <div class="col-md-9">
       <input type="text" id="first" class="form-control" name="first" >
       </div>
     </div>
     <div class="form-group">
       <label for="last" class="col-md-3 control-label">Last Name</label>
       <div class="col-md-9">
       <input type="text" id="last" class="form-control" name="last" >
       </div>
     </div>
     <div class="form-group">
       <label for="email" class="col-md-3 control-label">Email</label>
       <div class="col-md-9">
       <input type="email" id="email" class="form-control error" name="email">
       </div>
     </div>


     <div class="form-group">
       <label for="password1" class="col-md-3 control-label">Password</label>
       <div class="col-md-9">
       <input type="password" id="password1" class="form-control" name="password1">
       </div>
     </div>
     <div class="form-group">
       <label for="password2" class="col-md-3 control-label">Password Confirm</label>
       <div class="col-md-9">
       <input type="password" id="password2" class="form-control" name="password2">
       </div>
     </div>
  <div class="form-group">
    <div class="col-md-offset-3 col-md-9">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="checkbox" name="privacy" ><div id='checkboxLabel'>
            I agree to the <a href="#">privacy policy</a></div>
        </label>
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-md-offset-3 col-md-9">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </div>


   </form>
</div>
</div>





</div>  <!-- end container -->

<?php include 'art-footer.inc.php' ?>

 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
 <script src="chapter12-project02.js"></script>

<script type="text/javascript">


window.onload = init;
//alert("ran script");

</script>
<?php if($_GET['firstNameError'] == 1){
  echo("<style> #first {background-color:red;}</style>");
 }?>
 <?php if($_GET['lastNameError'] == 1){
   echo("<style> #last {background-color:red;}</style>");
 }?>
 <?php if($_GET['emailError'] == 1){
   echo("<style> #email {background-color:red;}</style>");
  }?>
  <?php if($_GET['passwordError'] == 1){
    echo("<style> #password1 {background-color:red;}</style>");
   }?>
   <?php if($_GET['confirmPasswordError'] == 1){
     echo("<style> #password2 {background-color:red;}</style>");
    }?>
    <?php if($_GET['checkBoxError'] == 1){
      echo("<style> #checkboxLabel {color:red;}</style>");
      echo("<style> #checkboxLabel a {color:red;}</style>");
     }?>


</body>
</html>
