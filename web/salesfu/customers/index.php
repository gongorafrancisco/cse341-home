<?php
// Sales FU Customers Controller

//Get the herokuConnect function out of the connections.php file
require_once '../../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../../library/sf-customers-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'allCustomers':
        $customers = getCustomers();
        if (count($customers) > 0) {
            $customersList = "<ul class='list-group'>";
            foreach ($customers as $customer) {
                $customersList .= "<li class='list-group-item'><span class='font-weight-bold'>" . $customer['customer_name'] . "</span></li>";
            }
            $customersList .= "</ul>";
        } else {
            $message = '<p class="bg-danger">Sorry, no customers were found.</p>';
        }
        include '../view/scriptures-resources.php';
        break;

    default:
    include '../view/sf-dashboard.php';
        break;
}
