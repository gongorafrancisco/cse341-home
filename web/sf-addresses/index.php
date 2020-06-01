<?php
// Sales FU Customer Address Controller

//Create or access a session
session_start();

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../model/sf-addresses-model.php';
require_once '../model/sf-customers-model.php';

//Get the functions from sf-functions.php file
require_once '../library/sf-functions.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

$searchOptions = array("No.", "Company" ,"Address", "Is Shipping Address");

switch ($action) {
     /* case 'confirmDeletion':
        $address_id = filter_input(INPUT_POST, 'addressNo', FILTER_VALIDATE_INT);
        $address_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $deleteOutcome = deleteAddress($address_id);
        if ($deleteOutcome === 1) {
            $message = "Address <strong>".$address_name. "</strong> was successfully deleted.";
            $_SESSION['message'] = $message;
            header("Location:/sf-address");
            exit;
           } else {
            $message = "Error <strong>".$address_name. "</strong> was not deleted.";
            include '../view/sf-address-delete.php';
            exit;
           }
        break;

    case 'delete': 
        $address_id = filter_input(INPUT_GET, 'addressNo', FILTER_VALIDATE_INT);
        $addressInfo = getAddressById($address_id);
        if (count($addressInfo) < 1) {
            $message = "<Sorry, address was not found.";
        }
        include '../view/sf-address-delete.php';
        break;*/
    case 'insertAddress':
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $customer_address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $shipping_address = filter_input(INPUT_POST, 'shipping', FILTER_SANITIZE_STRING);
        
         if (empty($customer_id) || empty($customer_address) || empty($shipping_address)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-addresses-add.php';
            exit;
        }

        $insertOutcome = insertAddress($customer_id, $customer_address, $shipping_address);

        // Check and report the result
        if ($insertOutcome === 1) {
            $message = "Address for was successfully added.";
            include '../view/sf-addresses-add.php';
            exit;
        } else {
            $message = "Sorry, the add the address failed. Please try again.";
            include '../view/sf-addresses-add.php';
            exit;
        }
        break;

    case 'create':
        include '../view/sf-addresses-add.php';
        break;
    
    /*case 'updateAddress':
        $address_id = filter_input(INPUT_POST, 'addressNo', FILTER_VALIDATE_INT);
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $address_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $address_department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
        $address_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $address_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        if (empty($customer_id) || empty($address_name) || empty($address_department)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-address-add.php';
            exit;
        }
        $updateOutcome = updateAddress($customer_id, $address_name, $address_department, $address_phone, $address_email, $address_id);
        if ($updateOutcome === 1) {
            $message = "Address <strong>".$address_name. "</strong> was successfully updated.";
            $_SESSION['message'] = $message;
            header("Location:/sf-address");
            exit;
           } else {
            $message = "Error <strong>".$address_name. "</strong> was not updated.";
            include '../view/sf-address-update.php';
            exit;
           }
        break;*/
    case 'modify':
        $address_id = filter_input(INPUT_GET, 'addressNo', FILTER_VALIDATE_INT);
        $addressInfo = getAddressById($address_id);
        if (count($addressInfo) < 1) {
            $message = 'Sorry, address was not found.';
        }
        include '../view/sf-addresses-update.php';
        break;

    /*case 'details':
        $address_id = filter_input(INPUT_GET, 'addressNo', FILTER_VALIDATE_INT);
        $addressInfo = getAddressDetails($address_id);
        if (count($addressInfo) > 0) {
            $addressDetails = generalInfoBuilder($addressInfo);
        } else {
            $message = '<p class="text-danger">Sorry, your search did not match any address.</p>';
        }
        include '../view/sf-address-details.php';
        break;*/

    case 'search':
        $optionSelected = filter_input(INPUT_GET, 'filter_option', FILTER_VALIDATE_INT);
        $userInput = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);
        $filterName = "";
        $filterValue = "";
        $address = "";
        switch ($optionSelected){
            case 0 : 
                $filterValue = filter_input(INPUT_GET, 'filter_value', FILTER_VALIDATE_INT);
                $address = getAddressById($filterValue);
            break;

            case 1 :
                $filterName = "c.customer_name";
                $filterValue = "%" . $userInput . "%";
                $address = getAddressesByFilter($filterName, $filterValue);
            break;

            case 2 :
                $filterName = "ca.customer_address";
                $filterValue = "%" . $userInput . "%";
                $address = getAddressesByFilter($filterName, $filterValue);
            break;

            case 3 :
                $filterValue = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);
                $address = getAddressesByBoolean($filterValue);
            break;

        }
        
        if (count($address) > 0) {
            $addressesFiltered = addressesBuilder($address);
        } else {
            $message = 'Sorry, your search did not match any address.';
        }
        include '../view/sf-addresses-filtered.php';
        break;  

    default:
       $addresses = getAddresses();
        if (count($addresses) > 0) {
            $addressesList = addressesBuilder($addresses);
        } else {
            $message = '<p class="bg-danger">Sorry, no addresses were found.</p>';
        }
        include '../view/sf-addresses.php';
        break;
}
