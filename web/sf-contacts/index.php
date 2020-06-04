<?php
// Sales FU Contacts Contacts Controller

//Create or access a session
session_start();

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../model/sf-contacts-model.php';
require_once '../model/sf-customers-model.php';

//Get the functions from sf-functions.php file
require_once '../library/sf-functions.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

$searchOptions = array("No.", "Name", "Company" ,"Department", "Phone", "Email");

switch ($action) {
    case 'filterContacts':
                // Prevent caching.
                header('Cache-Control: no-cache, must-revalidate');
                header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');
        
                // The JSON standard MIME header.
                header('Content-type: application/json');
        
                $customer_id = filter_input(INPUT_GET, 'customerNo', FILTER_VALIDATE_INT);
                $customerInfo = getContactsByCompany($customer_id);
                if (count($customerInfo) < 1) {
                    $message = "Sorry, no contacts were found.";
                }                
        
                // Send the data.
                echo json_encode($customerInfo);
    break;
     case 'confirmDeletion':
        $contact_id = filter_input(INPUT_POST, 'contactNo', FILTER_VALIDATE_INT);
        $contact_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $deleteOutcome = deleteContact($contact_id);
        if ($deleteOutcome === 1) {
            $message = "Contact <strong>".$contact_name. "</strong> was successfully deleted.";
            $_SESSION['message'] = $message;
            header("Location:/sf-contacts");
            exit;
           } else {
            $message = "Error <strong>".$contact_name. "</strong> was not deleted.";
            include '../view/sf-contact-delete.php';
            exit;
           }
        break;

    case 'delete': 
        $contact_id = filter_input(INPUT_GET, 'contactNo', FILTER_VALIDATE_INT);
        $contactInfo = getContactById($contact_id);
        if (count($contactInfo) < 1) {
            $message = "Sorry, contact was not found.";
        }
        include '../view/sf-contact-delete.php';
        break;
    case 'insertContact':
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $contact_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $contact_department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
        $contact_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $contact_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        
         if (empty($customer_id) || empty($contact_name) || empty($contact_department)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-contacts-add.php';
            exit;
        }

        $insertOutcome = insertContact($customer_id, $contact_name, $contact_department, $contact_phone, $contact_email);

        if ($insertOutcome === 1) {
            $message = "Contact <strong>" . $contact_name . "</strong> was successfully added.";
            include '../view/sf-contacts-add.php';
            exit;
        } else {
            $message = "Sorry, the add the contact failed. Please try again.";
            include '../view/sf-contacts-add.php';
            exit;
        }
        break;

    case 'create':
        include '../view/sf-contacts-add.php';
        break;
    
    case 'updateContact':
        $contact_id = filter_input(INPUT_POST, 'contactNo', FILTER_VALIDATE_INT);
        $customer_id = filter_input(INPUT_POST, 'customerNo', FILTER_VALIDATE_INT);
        $contact_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $contact_department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
        $contact_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $contact_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        if (empty($customer_id) || empty($contact_name) || empty($contact_department)) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-contacts-add.php';
            exit;
        }
        $updateOutcome = updateContact($customer_id, $contact_name, $contact_department, $contact_phone, $contact_email, $contact_id);
        if ($updateOutcome === 1) {
            $message = "Contact <strong>".$contact_name. "</strong> was successfully updated.";
            $_SESSION['message'] = $message;
            header("Location:/sf-contacts");
            exit;
           } else {
            $message = "Error <strong>".$contact_name. "</strong> was not updated.";
            include '../view/sf-contact-update.php';
            exit;
           }
        break;
    case 'modify':
        $contact_id = filter_input(INPUT_GET, 'contactNo', FILTER_VALIDATE_INT);
        $contactInfo = getContactById($contact_id);
        if (count($contactInfo) < 1) {
            $message = 'Sorry, contact was not found.';
        }
        include '../view/sf-contact-update.php';
        break;

    /*case 'details':
        $contact_id = filter_input(INPUT_GET, 'contactNo', FILTER_VALIDATE_INT);
        $contactInfo = getContactDetails($contact_id);
        if (count($contactInfo) > 0) {
            $contactDetails = generalInfoBuilder($contactInfo);
        } else {
            $message = '<p class="text-danger">Sorry, your search did not match any contact.</p>';
        }
        include '../view/sf-contact-details.php';
        break;*/

    case 'search':
        $optionSelected = filter_input(INPUT_GET, 'filter_option', FILTER_VALIDATE_INT);
        $userInput = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);
        $filterName = "";
        $filterValue = "";
        $contacts = "";
        switch ($optionSelected){
            case 0 : 
                $filterValue = filter_input(INPUT_GET, 'filter_value', FILTER_VALIDATE_INT);
                $contacts = getContactById($filterValue);
            break;

            case 1 :
                $filterName = "cc.contact_name";
                $filterValue = "%" . $userInput . "%";
                $contacts = getContactsByFilter($filterName, $filterValue);
            break;

            case 2 :
                $filterName = "c.customer_name";
                $filterValue = "%" . $userInput . "%";
                $contacts = getContactsByFilter($filterName, $filterValue);
            break;

            case 3 :
                $filterName = "cc.contact_department";
                $filterValue = "%" . $userInput . "%";
                $contacts = getContactsByFilter($filterName, $filterValue);
            break;

            case 4 :
                $filterName = "cc.contact_phone";
                $filterValue = "%" . $userInput . "%";
                $contacts = getContactsByFilter($filterName, $filterValue);
            break;

            case 5 :
                $filterName = "cc.contact_email";
                $filterValue = "%" . $userInput . "%";
                $contacts = getContactsByFilter($filterName, $filterValue);
            break;
        }
        
        if (count($contacts) > 0) {
            $contactsFiltered = contactsBuilder($contacts);
        } else {
            $message = 'Sorry, your search did not match any contact.';
        }
        include '../view/sf-contacts-filtered.php';
        break; 

    default:
/*         if (!isset($_SESSION['member_name'])) { 
            header("Location: /salesfu");
            die();
        } */
       $contacts = getContacts();
        if (count($contacts) > 0) {
            $contactsList = contactsBuilder($contacts);
        } else {
            $message = 'Sorry, no contacts were found.';
        }
        include '../view/sf-contacts.php';
        break;
}
