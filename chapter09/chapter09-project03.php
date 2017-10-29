<?php


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

   <!-- Google fonts used in this theme  -->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

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

<?php include 'book-header.inc.php';
?>
<?php
  $customerArray = array();
  $filename = 'customers.txt';
  $customerFile = file($filename) or die('Error: Cannot find file');
  $delimiter = ',';
  foreach ($customerFile as $customer){
    $customerData = explode($delimiter, $customer);
    $id = $customerData[0];
    $customerArray[$id]['id']  = $customerData[0];
    $customerArray[$id]['first']  = $customerData[1];
    $customerArray[$id]['last']  = $customerData[2];
    $customerArray[$id]['email']  = $customerData[3];
    $customerArray[$id]['university']  = $customerData[4];
    $customerArray[$id]['address']  = $customerData[5];
    $customerArray[$id]['city']  = $customerData[6];
    $customerArray[$id]['state']  = $customerData[7];
    $customerArray[$id]['country']  = $customerData[8];
    $customerArray[$id]['zip']  = $customerData[9];
    $customerArray[$id]['phone']  = $customerData[10];

  }
?>



<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail -->

      <div class="col-md-10">  <!-- start main content column -->

         <!-- Customer panel  -->
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
              $count = 0;
              foreach($customerArray as $value){
                echo "<tr>";
                echo "<td><a href='chapter09-project03.php?id=" . $value['id'] . "'>" . $value['first'] . " " . $value['last'] . "</a></td>";
                echo "<td>" . $value['email'] . "</td>";
                echo "<td>" . $value['university'] . "</td>";
                echo "<td>" . $value['city'] . "</td>";
                echo "</tr>";
              }
             ?>

           </table>
         </div>

         <?php
         if(array_key_exists('id', $_GET)){
           $orderArray = array();
           $filename = 'orders.txt';
           $orderFile = file($filename) or die('Error: Cannot find file');
           $delimiter = ',';
           foreach ($orderFile as $order){
             $orderData = explode($delimiter, $order);
             $orderID = $orderData[0];
             $orderArray[$orderID]['orderID']  = $orderData[0];
             $orderArray[$orderID]['customerID']  = $orderData[1];
             $orderArray[$orderID]['isbn']  = $orderData[2];
             $orderArray[$orderID]['title']  = $orderData[3];
             $orderArray[$orderID]['category']  = $orderData[4];

           }
           $id = $_GET['id'];
           echo '<div class="panel panel-danger spaceabove">';
           echo '<div class="panel-heading"><h4>' . $customerArray[$id]['first'] . " " . $customerArray[$id]['last'] . '</h4></div>';

           echo "<table class='table'>";

          $count = 0;
          foreach($orderArray as $value){
            if($value['customerID'] == $id){
              $count++;
              if($count == 1){
              echo "<tr>";
              echo "<th></th>";
              echo "<th>ISBN</th>";
              echo "<th>Title</th>";
              echo "<th>Category</th>";
              echo "</tr>";
            }

            echo "<tr>";
            echo '<td><img src="images/book/tinysquare/' . $value['isbn'] . '.jpg"' . ' alt="..." /></td>';
            echo "<td>" . $value['isbn'] . "</td>";
            echo "<td>" . $value['title'] . "</td>";
            echo "<td>" . $value['category'] . "</td>";
            echo "</tr>";
          }

          }

          if($count == 0){
            echo "<tr>";
            echo "<td colspan = '4'>No Order Information</td>";
            echo "</tr>";
          }

          echo "</table>";
          echo "</div>";
          }
          ?>


      </div>


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
