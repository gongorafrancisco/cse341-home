<?php
// Sales FU Quote Requests Controller

//Create or access a session
session_start();

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../model/sf-customers-model.php';
require_once '../model/sf-contacts-model.php';
require_once '../model/sf-requests-model.php';


//Get the functions from sf-functions.php file
require_once '../library/sf-functions.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

$searchOptions = array("No.", "Name", "Company" ,"Department", "Phone", "Email");

switch ($action) {
/*     case 'confirmDeletion':
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $customer_name = filter_input(INPUT_POST, 'officialName', FILTER_SANITIZE_STRING);
        $deleteOutcome = deleteCustomer($customer_id);
        if ($deleteOutcome === 1) {
            $message = "Customer <strong>".$customer_name. "</strong> was successfully deleted.";
            $_SESSION['message'] = $message;
            header("Location:/sf-customers");
            exit;
           } else {
            $message = "Error <strong>".$customer_name. "</strong> was not deleted.";
            include '../view/sf-customer-delete.php';
            exit;
           }
        break; */

/*     case 'delete':
        $customer_id = filter_input(INPUT_GET, 'customerNo', FILTER_VALIDATE_INT);
        $customerInfo = getCustomerById($customer_id);
        if (count($customerInfo) < 1) {
            $message = "<Sorry, customer was not found.";
        }
        include '../view/sf-customer-delete.php';
        break; */

     case 'insertRequest':
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $contact_id = filter_input(INPUT_POST, 'contactNo', FILTER_VALIDATE_INT);
        $request_datails = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
        $delivery_date = filter_input(INPUT_POST, 'dateDelivery', FILTER_SANITIZE_STRING);

        if (empty($customer_id) || empty($contact_id) || empty($request_datails) || empty($delivery_date)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-customer-add.php';
            exit;
        }

        $insertOutcome = insertRequest($customer_id, $contact_id, $request_datails, $delivery_date);

        // Check and report the result
        if ($insertOutcome === 1) {
            $message = "The request was successfully added.";
            include '../view/sf-request-add.php';
            exit;
        } else {
            $message = "Sorry, the add the request failed. Please try again.";
            include '../view/sf-request-add.php';
            exit;
        }
        break;

    case 'create':
        include '../view/sf-request-add.php';
        break;
    
/*     case 'updateCustomer':
        $customer_name = filter_input(INPUT_POST, 'officialName', FILTER_SANITIZE_STRING);
        $customer_taxid = filter_input(INPUT_POST, 'taxID', FILTER_SANITIZE_STRING);
        $customer_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $customer_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        if (empty($customer_name) || empty($customer_taxid)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-customer-update.php';
            exit;
        }
        $updateOutcome = updateCustomer($customer_id, $customer_name, $customer_taxid, $customer_phone, $customer_email);
        if ($updateOutcome === 1) {
            $message = "Customer <strong>".$customer_name. "</strong> was successfully updated.";
            $_SESSION['message'] = $message;
            header("Location:/sf-customers");
            exit;
           } else {
            $message = "Error <strong>".$customer_name. "</strong> was not updated.";
            include '../view/sf-customer-update.php';
            exit;
           }
        break; */

/*     case 'modify':
        $customer_id = filter_input(INPUT_GET, 'customerNo', FILTER_VALIDATE_INT);
        $customerInfo = getCustomerById($customer_id);
        if (count($customerInfo) < 1) {
            $message = 'Sorry, customer was not found.';
        }
        include '../view/sf-customer-update.php';
        break; */

/*     case 'details':
        $customer_id = filter_input(INPUT_GET, 'customerNo', FILTER_VALIDATE_INT);
        $customerInfo = getCustomerDetails($customer_id);
        if (count($customerInfo) > 0) {
            $customerDetails = generalInfoBuilder($customerInfo);
        } else {
            $message = "Sorry, your search did not match any customer.";
        }
        include '../view/sf-customer-details.php';
        break; */

    /* case 'search':
        $optionSelected = filter_input(INPUT_GET, 'filter_option', FILTER_VALIDATE_INT);
        $userInput = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);
        $filterName = "";
        $filterValue = "";
        $customers = "";
        switch ($optionSelected){
            case 0 : 
                $filterValue = filter_input(INPUT_GET, 'filter_value', FILTER_VALIDATE_INT);
                $customers = getCustomerById($filterValue);
            break;

            case 1 :
                $filterName = "customer_name";
                $filterValue = "%" . $userInput . "%";
                $customers = getCustomersByFilter($filterName, $filterValue);
            break;

            case 2 :
                $filterName = "customer_taxid";
                $filterValue = "%" . $userInput . "%";
                $customers = getCustomersByFilter($filterName, $filterValue);
            break;

            case 3 :
                $filterName = "customer_phone";
                $filterValue = "%" . $userInput . "%";
                $customers = getCustomersByFilter($filterName, $filterValue);
            break;

            case 4 :
                $filterName = "customer_email";
                $filterValue = "%" . $userInput . "%";
                $customers = getCustomersByFilter($filterName, $filterValue);
            break;
        }
        
        if (count($customers) > 0) {
            $customersFiltered = customersBuilder($customers);
        } else {
            $message = 'Sorry, your search did not match any customer.';
        }
        include '../view/sf-customers-filtered.php';
        break; */

    default:
/*         if (!isset($_SESSION['member_name'])) { 
            header("Location: /salesfu");
            die();
        } */
        $requests = getRequests();
        if (count($requests) > 0) {
            $requestsList = requestsBuilder($requests);
        } else {
            $message = 'Sorry, no requests were found';
        }
        include '../view/sf-requests.php';
        break;
}
