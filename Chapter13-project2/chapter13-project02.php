<?php
  session_start();

// in a real application, these constants would likely be defined
// within an external file
define("TAX_PERCENT",0.10);
define("SHIPPING_THRESHOLD",2000);
define("SHIPPING_FLAT_AMOUNT",100);




// outputs a single cart item
function outputCartRow($file, $title, $quantity, $price) {
   echo '<tr>';
   echo '<td><img class="img-thumbnail" src="images/art/works/tiny/' . $file . '.jpg" alt="..."></td>';
   echo '<td>' . $title . '</td>';
   echo '<td>' . $quantity . '</td>';
   echo '<td>$' . number_format($price,2) . '</td>';
   echo '<td>$' . number_format($quantity * $price,2) . '</td>';
   echo '</tr>';
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Chapter 13</title>

 <!-- Bootstrap core CSS -->
 <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="chapter13-project02.css" rel="stylesheet">

 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
   <script src="../../assets/js/html5shiv.js"></script>
   <script src="../../assets/js/respond.min.js"></script>
 <![endif]-->
</head>

<body>



<?php
  include 'includes/art-header.inc.php';
  require_once('includes/art-config.inc.php');
  require_once('lib/ArtistDB.class.php');
  require_once('lib/ArtWorkDB.class.php');
  require_once('lib/GenreDB.class.php');
  require_once('lib/SubjectDB.class.php');
  require_once('lib/DatabaseHelper.class.php');
  ?>

<div class="container">

   <div class="page-header">
      <h2>View Cart</h2>

      <table class="table table-condensed">
         <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
         </tr>
         <?php
            // display all the items in the shopping cart
            $_SESSION['subtotal'] = 0;
            foreach($_SESSION['ShoppingCart'] as $picture){
              $artworkData = new ArtWorkDB();
              $requestedWork = $artworkData->findById($picture);

              echo('<tr>');
              echo('<th>' . '<img src="images/art/works/square-thumbs/' . $requestedWork['ImageFileName'] . '.jpg" ' . 'alt="' . $requestedWork['Title'] . '"/>' . '</th>');
              echo('<th>' . $requestedWork['Title'] . '</th>');
              $index = array_search($picture, $_SESSION['ShoppingCart']);
              $quantity = $_SESSION['quantity'][$index];
              echo('<th>' . $quantity . '</th>');
              $cost = number_format($requestedWork["MSRP"],2);
              echo('<th>' . $cost . '</th>');
              $iTotal = ($cost * $quantity);
              $_SESSION['subtotal'] = ($_SESSION['subtotal'] + $iTotal);
              echo('<th>$' . number_format($iTotal, 2) . '</th>');
              echo('</tr>');

            }


            // now calculate subtotal, tax, shipping, and grand total
            $tax = $_SESSION['subtotal'] * TAX_PERCENT;
            $shipping = 0;
            if ($_SESSION['subtotal'] <= SHIPPING_THRESHOLD)
               $shipping = SHIPPING_FLAT_AMOUNT;
            $grandTotal = $_SESSION['subtotal'] + $tax + $shipping;

         ?>

         <tr class="success strong">
            <td colspan="4" class="moveRight">Subtotal</td>
            <td>$<?php echo number_format($_SESSION['subtotal'],2) ?></td>
         </tr>
         <tr class="active strong">
            <td colspan="4" class="moveRight">Tax</td>
            <td>$<?php echo number_format($tax,2) ?></td>
         </tr>
         <tr class="strong">
            <td colspan="4" class="moveRight">Shipping</td>
            <td>$<?php echo number_format($shipping,2) ?></td>
         </tr>
         <tr class="warning strong text-danger">
            <td colspan="4" class="moveRight">Grand Total</td>
            <td>$<?php echo number_format($grandTotal,2) ?></td>
         </tr>
         <tr >
            <td colspan="4" class="moveRight"><button type="button" class="btn btn-primary" >Continue Shopping</button></td>
            <?php // note ... checkout button empties the cart which is helpful for testing ?>
            <td><a href="emptyCart.php" class="btn btn-success" >Checkout</a></td>
         </tr>
      </table>



   </div>  <!-- end main row -->
</div>  <!-- end container -->

<?php include 'includes/art-footer.inc.php' ?>

 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
</body>
</html>
