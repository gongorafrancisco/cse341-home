<?php
//Prove Projects Controller
session_start();
if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = [];
}
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'store':
        include '../view/storedemo.php';
        break;

    case 'se':
        $_SESSION['product'][0] = 'iPhone SE';
        include '../view/storedemo.php';
        break;

    case 'tw':
        $_SESSION['product'][1] = 'iPhone 12';
        include '../view/storedemo.php';
        break;

    case 'twp':
        $_SESSION['product'][2] = 'iPhone 12 Pro';
        include '../view/storedemo.php';
        break;

    case 'cart':
        if(!empty($_SESSION['product'])){
            $cartDetails = "<form class='needs-validation' action='../proveprojects/index.php' method='post'>";
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
             <a class='btn btn-danger' href='../proveprojects/index.php?action=delete&id=".urlencode($key)."'>Remove</a>
             </div>
             </div>
             </div>";
             }
             $cartDetails .= "<div class='form-row'><input class='btn btn-primary' type='submit' value='Checkout'><input type='hidden' name='action' value='checkout'></div></form>";
            }
        include '../view/cartdemo.php';
        break;

    case 'delete':
        $id = filter_input(INPUT_GET, 'id');
        unset($_SESSION['product'][$id]);
        if (isset($_SESSION['product'])) {
            $cartDetails = "<form class='needs-validation' action='../proveprojects/index.php' method='post'>";
            $products = $_SESSION['product'];
            foreach ($products as $key => $product) {
                $cartDetails .=
                    "<div class='form-group'>
                <label for='" . $product . "'>" . $product . "</label>
                <div class='form-row'>
                <div class='col'>
                <input type='number' id='" . $product . "' class='form-control' name='quantity-" . $key . "' min='1' step='1' value='1'>
                </div>
                <div class='col'>
                <a class='btn btn-danger' href='../proveprojects/index.php?action=delete&id=" . urlencode($key) . "'>Remove</a>
                </div>
                </div>
                </div>";
            }
            $cartDetails .= "<div class='form-row'><input class='btn btn-primary' type='submit' value='Checkout'><input type='hidden' name='action' value='checkout'></div></form>";
        }
        include '../view/cartdemo.php';
        break;
        case 'checkout':
            $_SESSION['quantity']=[];
            if(isset($_POST['quantity-0'])){
              $quantity0 = filter_input(INPUT_POST, 'quantity-0', FILTER_SANITIZE_NUMBER_INT);
              $_SESSION['quantity'][0] = $quantity0;
            }
            if(isset($_POST['quantity-1'])){
              $quantity1 = filter_input(INPUT_POST, 'quantity-1', FILTER_SANITIZE_NUMBER_INT);
              $_SESSION['quantity'][1] = $quantity1;
            }
            if(isset($_POST['quantity-2'])){
              $quantity2 = filter_input(INPUT_POST, 'quantity-2', FILTER_SANITIZE_NUMBER_INT);
              $_SESSION['quantity'][2] = $quantity2;
            }
            include '../view/checkoutdemo.php';
           break;
           case 'complete':
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
            $address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
            $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);
    
            $_SESSION['customers']['firstName'] = 'Name: '.$firstName.' '.$lastName;
            $_SESSION['customers']['email'] = 'Email: '.$email;
            $_SESSION['customers']['address'] = 'Address: '.$address.'. '.$address2;
            $_SESSION['customers']['zip'] = 'Zip Code: '.$zip;
    
            $customers = $_SESSION['customers'];
            $customerSummary = "<div class='list-group'>
                                    <div class='list-group-item'>";
           foreach($customers as $customer){
            $customerSummary .= 
             "<p class='mb1'>". $customer ."</p>";
             }
           $customerSummary .= "</div></div>";
    
            $productSummary = "<div class='list-group'><div class='row'><ul class='col'>";
               $products = $_SESSION['product'];
               $quantities = $_SESSION['quantity'];
              
               foreach($products as $key=>$product){
               $productSummary .= 
                "<li class='list-group-item'>"
                . $product ."</li>";
                }
                $productSummary .= "</ul><ul class='col'>";
                foreach($quantities as $quantity){
                    $productSummary .=
                "<li class='list-group-item text-primary text-center'>".$quantity."</li>";
                }
              $productSummary .= "</ul></div></div>";
              include '../view/confirmationdemo.php';
          break;
          
          case 'backToStore':
            session_unset();
            session_destroy();
            header("Location:/proveprojects/index.php?action=store");
        break;
    default:
        break;
}
