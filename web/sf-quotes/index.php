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

$searchOptions = array("No.", "Quote Date", "Company", "Contact", "Total");

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
            completeRequest($requestComplete, $request_id);
            $message = "The request #".$request_id." was successfully completed by the <strong>quote #".$insertOutcome."</strong>";
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
        break;
}
