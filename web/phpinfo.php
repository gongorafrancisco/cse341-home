<?php
//Get the herokuConnect function out of the connections.php file
require_once 'library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once 'model/sf-contacts-model.php';

//Get the functions from sf-functions.php file
require_once 'library/sf-functions.php';

$action = filter_input(INPUT_GET, 'action');

switch ($action) {
    case "filterContacts":
        // Prevent caching.
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

        // The JSON standard MIME header.
        header('Content-type: application/json');

        // This ID parameter is sent by our javascript client.
        $customer_id = filter_input(INPUT_GET, 'customerNo', FILTER_VALIDATE_INT);
        $customerInfo = getContactsByCompany($customer_id);
        if (count($customerInfo) < 1) {
            $message = "<Sorry, customer was not found.";
        }
        // Here's some data that we want to send via JSON.
        // We'll include the $id parameter so that we
        // can show that it has been passed in correctly.
        // You can send whatever data you like.
        

        // Send the data.
        echo json_encode($customerInfo);
        break;
}
