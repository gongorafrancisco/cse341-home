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

$searchOptions = array("No.", "Request Date", "Company", "Contact", "Completed");

switch ($action) {
    case 'confirmDeletion':
        $request_id = filter_input(INPUT_POST, 'requestNo', FILTER_VALIDATE_INT);
        $deleteOutcome = deleteRequest($request_id);
        if ($deleteOutcome === 1) {
            $message = "Request <strong>#".$request_id. "</strong> was successfully deleted.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
           } else {
            $message = "Error request<strong>#".$request_id. "</strong> was not deleted.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
           }
        break;

    case 'delete':
        $request_id = filter_input(INPUT_GET, 'requestNo', FILTER_VALIDATE_INT);
        $requestInfo = getRequestById($request_id);
        if (count($requestInfo) < 1) {
            $message = 'Sorry, request was not found.';
        }
        include '../view/sf-request-delete.php';
        break;

     case 'insertRequest':
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $contact_id = filter_input(INPUT_POST, 'contactNo', FILTER_VALIDATE_INT);
        $request_details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);

        if (empty($customer_id) || empty($contact_id) || empty($request_details)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-request-add.php';
            exit;
        }

        $insertOutcome = insertRequest($customer_id, $contact_id, $request_details);

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
    
     case 'updateRequest':
        $request_id = filter_input(INPUT_POST, 'requestNo', FILTER_VALIDATE_INT);
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $contact_id = filter_input(INPUT_POST, 'contactNo', FILTER_VALIDATE_INT);
        $request_details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
        
        if (empty($request_id) || empty($customer_id) || empty($contact_id) || empty($request_details)) {
            $message = "You must provide information in all form fields, select the request and try again.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
        }
        $updateOutcome = updateRequest($request_id, $customer_id, $contact_id, $request_details);
        if ($updateOutcome === 1) {
            $message = "Quote request <strong># ".$request_id. "</strong> was successfully updated.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
           } else {
            $message = "Error quote request<strong># ".$request_id. "</strong> was not updated.";
            $_SESSION['message'] = $message;
            header("Location:/sf-requests");
            die();
           }
        break;

        case 'modify':
            $request_id = filter_input(INPUT_GET, 'requestNo', FILTER_VALIDATE_INT);
            $requestInfo = getRequestById($request_id);
            if (count($requestInfo) < 1) {
                $message = 'Sorry, request was not found.';
            }
            include '../view/sf-request-update.php';
            break;

    case 'search':
        $optionSelected = filter_input(INPUT_GET, 'filter_option', FILTER_VALIDATE_INT);
        $userInput = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);
        $filterName = "";
        $filterValue = "";
        $requests = "";
        switch ($optionSelected){
            case 0 : 
                $filterValue = filter_input(INPUT_GET, 'filter_value', FILTER_VALIDATE_INT);
                $requests = getRequestById($filterValue);
            break;

            case 1 :
                $filterName = "qr.request_date";
                $dateStart = $userInput." 00:00:00";
                $dateEnd = $userInput." 23:59:59";
                $requests = getRequestsByDate($filterName, $dateStart, $dateEnd);
            break;

            case 2 :
                $filterName = "c.customer_name";
                $filterValue = "%" . $userInput . "%";
                $requests = getRequestsByFilter($filterName, $filterValue);
            break;

            case 3 :
                $filterName = "cc.contact_name";
                $filterValue = "%" . $userInput . "%";
                $requests = getRequestsByFilter($filterName, $filterValue);
            break;

            case 4 :
                $filterName = "qr.request_complete";
                $filterValue = $userInput;
                $requests = getRequestsByBoolean($filterName, $filterValue);
            break;
        }
        
        if (count($requests) > 0) {
            $requestsFiltered = requestsBuilder($requests);
        } else {
            $message = 'Sorry, your search did not match any request.';
        }
        include '../view/sf-requests-filtered.php';
        break;

    default:
        if (!isset($_SESSION['member_name'])) { 
            header("Location: /salesfu");
            die();
        }
        $optionSelected = "";
        $requests = getRequests();
        if (count($requests) > 0) {
            $requestsList = requestsBuilder($requests);
        } else {
            $message = 'Sorry, no requests were found';
        }
        include '../view/sf-requests.php';
        break;
}
