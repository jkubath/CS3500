<?php
    try {
        
        $connString = "mysql:host=localhost;dbname=bookcrm";
        $user ="root";
        $pass = "";
        
        $pdo = new PDO ($connString, $user, $pass);
        
        $sql = "select * from Categories order by CategoryName";
        $categories = $pdo -> query($sql);
        $sql = "select * from Imprints order by Imprint";
        $imprints = $pdo -> query($sql);
        
        $user = "%";
        if(isSet($_GET["search"])){
            $user = $_GET["search"] . "%";
            
        }
        $sql = "select FirstName, LastName, Email, University, City from Customers WHERE LastName LIKE '$user' order by LastName";
        
            $customers = $pdo -> query($sql);
          
        $pdo = null;
    }
    catch(PDOException $e){
        die( $e->getMessage() );
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'includes/book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'includes/book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th>Name</th>
               <th>Email</th>
               <th>University</th>
               <th>City</th>
             </tr>
             <?php 
                while($customer = $customers->fetch()){
                    echo "<tr><th><a href='#'>" . $customer['FirstName'] . " " . $customer['LastName'] . "</a></th>";
                    echo "<th>" . $customer['Email'] . "</th>";
                    echo "<th>" . $customer['University'] . "</th>";
                    echo "<th>" . $customer['City'] . "</th>";
                    echo "</tr>";
                }
             
             ?>
             

           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">
					<?php 
					   while($row = $categories->fetch()){
					       echo "<li><a href='#' >" . $row['CategoryName'] . "</a></li>";
					   }
					
					?>
               </ul> 
         </div>
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
				<?php 
					   while($row = $imprints->fetch()){
					       echo "<li><a href='#' >" . $row['Imprint'] . "</a></li>";
					   }
					
					?>
            </ul>
         </div>         
      </div>  <!-- end left navigation rail --> 


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>