<?php
// Sales FU Quotes Controller

//Create or access a session
session_start();

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../model/sf-customers-model.php';
require_once '../model/sf-contacts-model.php';
require_once '../model/sf-requests-model.php';
require_once '../model/sf-quotes-model.php';


//Get the functions from sf-functions.php file
require_once '../library/sf-functions.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

$searchOptions = array("No.", "Quote Date", "Company", "Contact", "Details", "Completed", "Delivery Date");

switch ($action) {

    case 'insertQuote':
        $request_id = filter_input(INPUT_POST, 'requestNo', FILTER_VALIDATE_INT);
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $contact_id = filter_input(INPUT_POST, 'contactNo', FILTER_VALIDATE_INT);
        $quote_datails = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
        $quote_subtotal = filter_input(INPUT_POST, 'subtotal', FILTER_VALIDATE_FLOAT);
        $quote_taxes = filter_input(INPUT_POST, 'taxes', FILTER_VALIDATE_FLOAT);
        $quote_total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_FLOAT);

        if (empty($request_id) || empty($customer_id) || empty($contact_id) || empty($quote_datails) || empty($quote_subtotal) || empty($quote_taxes) || empty($quote_total)) {
            $message = "Invalid operation, you must provide valid information for all quote fields. Please select a request and try again.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
        }

        $insertOutcome = insertQuote($request_id, $customer_id, $contact_id, $quote_datails, $quote_subtotal, $quote_taxes, $quote_total);
        
        if ($insertOutcome > 0) {
            $requestComplete = "t";
            updateRequest($requestComplete, $request_id);
            $message = "The request ".$request_id." was successfully completed by the <strong>quote number: ".$insertOutcome."</strong>";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
        } else {
            $message = "Sorry, the add the quote failed. Please try again.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
        }
        break;

    case 'create':
        $request_id = filter_input(INPUT_GET, 'requestNo', FILTER_VALIDATE_INT);
        $requestInfo = getRequestById($request_id);
        if(count($requestInfo) > 0){
            $requestNo = $requestInfo['0']['request_id'];
            $customerNo = $requestInfo['0']['customer_id'];
            $customerName = $requestInfo['0']['customer_name'];
            $contactNo = $requestInfo['0']['contact_id'];
            $contactName = $requestInfo['0']['contact_name'];
            include '../view/sf-quote-add.php';
        } else {
            $message = "Invalid quote request number, check the info and try again.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
        }
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

   /*  case 'complete':
        $quote_id = filter_input(INPUT_GET, 'quoteNo', FILTER_VALIDATE_INT);
        include "../quotes/?action=createFR&quoteNo=$quote_id";
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
/* 
    default:
        if (!isset($_SESSION['member_name'])) { 
            header("Location: /salesfu");
            die();
        }
        $optionSelected = "";
        $quotes = getQuotes();
        if (count($quotes) > 0) {
            $quotesList = quotesBuilder($quotes);
        } else {
            $message = 'Sorry, no quotes were found';
        }
        include '../view/sf-quotes.php';
        break; */
}
