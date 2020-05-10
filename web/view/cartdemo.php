<?php
session_start();
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 switch ($action) {
  case 'delete' :
    $id = filter_input(INPUT_GET, 'id');
    unset($_SESSION['product'][$id]);
    if(isset($_SESSION['product'])){
      $cartDetails = "<form class='needs-validation' action='checkoutdemo.php' method='post'>";
       $products = $_SESSION['product'];
      foreach($products as $key=>$product){
       $cartDetails .= 
       "<div class='form-group'>
        <label for='". $product ."'>". $product ."</label>
        <div class='form-row'>
        <div class='col'>
        <input type='number' id='".$product."' class='form-control' name='quantity-".$key."' min='1' step='1' value='1'>
        </div>
        <div class='col'>
        <a class='btn btn-danger' href='cartdemo.php?action=delete&id=".urlencode($key)."'>Remove</a>
        </div>
        </div>
        </div>";
        }
        $cartDetails .= "<div class='form-row'><input class='btn btn-primary' type='submit' value='Checkout'><input type='hidden' name='action' value='checkout'></div></form>";
      }
  break;
  default:
  if(!empty($_SESSION['product'])){
    $cartDetails = "<form class='needs-validation' action='checkoutdemo.php' method='post'>";
    $products = $_SESSION['product'];
   foreach($products as $key=>$product){
    $cartDetails .= 
    "<div class='form-group'>
     <label for='". $product ."'>". $product ."</label>
     <div class='form-row'>
     <div class='col'>
     <input type='number' id='".$product."' class='form-control' name='quantity-".$key."' min='1' step='1' value='1'>
     </div>
     <div class='col'>
     <a class='btn btn-danger' href='cartdemo.php?action=delete&id=".urlencode($key)."'>Remove</a>
     </div>
     </div>
     </div>";
     }
     $cartDetails .= "<div class='form-row'><input class='btn btn-primary' type='submit' value='Checkout'><input type='hidden' name='action' value='checkout'></div></form>";
    }
  break;
}
?>
<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Cart Demo</title>
         <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main class="container-fluid">
        <h2 class="invisible">1</h2>
        <div>
            <a href="storedemo.php">
        <svg class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
</svg>Back to Store</a>
        </div>
             <h1 class="display-4 text-center">Cart</h1>
              <h2 class="invisible">1</h2>
              <div class="container-md">
        <?php 
            if(isset($cartDetails)){
              echo $cartDetails;
            }
          ?>
          </div>
        </main>    
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </body>
</html>