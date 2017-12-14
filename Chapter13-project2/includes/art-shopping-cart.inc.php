<?php
  session_start();
  require_once('includes/art-config.inc.php');
  require_once('lib/ArtistDB.class.php');
  require_once('lib/ArtWorkDB.class.php');
  require_once('lib/GenreDB.class.php');
  require_once('lib/SubjectDB.class.php');
  require_once('lib/DatabaseHelper.class.php');

?>

<div class="panel panel-primary">
   <div class="panel-heading">
      <h3 class="panel-title">Cart </h3>
   </div>
   <div class="panel-body">
      <?php
         foreach($_SESSION['ShoppingCart'] as $cart){
           $artworkData = new ArtWorkDB();
           //echo($picture);
           $requestedWork = $artworkData->findById($cart);
           echo('
            <div class="media">
              <a class="pull-left" href="display-art-work.php?id=' . $cart . '">
                <img class="media-object" src="images/art/works/square-thumbs/' . $requestedWork['ImageFileName'] . '.jpg" alt="" width="32">
              </a>
              <div class="media-body">
                <p class="cartText"><a href="display-art-work.php?id=' . $cart . '"></a></p>
              </div>
            </div>




         <strong class="cartText">Subtotal: <span class="text-warning">' . number_format($requestedWork['MSRP'], 2) . '</span></strong>
         <div>
            <a href="chapter13-project02.php" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span> Edit</a>
            <button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-arrow-right"></span> Checkout</button>
         </div>
         ');
       }


      ?>
   </div>
</div>
