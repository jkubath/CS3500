<?php
  session_start();

  //Get the id for the picture
  $picture = $_GET["artworkID"];
  //echo($picture);

  if(in_array($picture, $_SESSION['ShoppingCart'])){
    //echo("Found");
    $index = array_search($picture, $_SESSION['ShoppingCart']);
    $_SESSION['quantity'][$index] = $_SESSION['quantity'][$index] + 1;
    //echo($_SESSION['quantity'][$index]);

  }
  else {
    //echo("New");
    array_push($_SESSION['ShoppingCart'], $picture);
    $index = array_search($picture, $_SESSION['ShoppingCart']);
    //echo($index);
    //array_push($_SESSION['quantity'][$index], 1);
    $_SESSION['quantity'][$index] = 1;
    //echo($_SESSION['quantity'][$index]);
  }

  //print_r($_SESSION["ShoppingCart"]);
  header("Location: http://localhost/Assignment-Files/chapter13/project2/chapter13-project02.php");
  //include 'chapter13-project02.php';
?>
