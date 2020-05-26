<?php
// Sales FU Customers Controller

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../model/sf-customers-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'customerDetails':
        $customer_id = filter_input(INPUT_GET, 'customerNo', FILTER_VALIDATE_INT);
        $customerInfo = getCustomerDetails($customer_id);
        if (count($customerInfo) > 0){
            $customerDetails = "<div class='container-fluid rounded py-3 bg-light'><h5>Customer General Info</h5>
            <table class='table'>
            <thead class='thead-light'>
                <tr>
                    <th scope='col'>No.</th>
                    <th>Name</th>
                    <th>Tax ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($customerInfo as $detail) {
                $customerDetails .= "<tr>
                <th scope='row'>" . $detail['customer_id'] . "</th>
                <td>" . $detail['customer_name'] . "</td>
                <td>" . $detail['customer_taxid'] . "</td>
                <td>" . $detail['customer_phone'] . "</td>
                <td>" . $detail['customer_email'] . "</td>
            </tr>";
            }
            $customerDetails .= "</tbody></table></div>";
        } else {
            $message = '<p class="text-danger">Sorry, your search did not match any customer.</p>';
        }
        include '../view/sf-customer-details.php';
    break;

    case 'filterCustomers':
        $userInput = filter_input(INPUT_GET, 'filter_value', FILTER_SANITIZE_STRING);
        $filtervalue = "%" . $userInput . "%";
        $customers = getCustomersByFilter($filtervalue);
        if (count($customers) > 0) {
            $customersFiltered = "<table class='table'>
            <thead class='thead-light'>
                <tr>
                    <th scope='col'>Name</th>
                    <th>Tax ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($customers as $customer) {
                $customersFiltered .= "<tr>
                <th scope='row'>" . $customer['customer_name'] . "</th>
                <td>" . $customer['customer_taxid'] . "</td>
                <td>" . $customer['customer_phone'] . "</td>
                <td>" . $customer['customer_email'] . "</td>
                <td><a href='../sf-customers/index.php?action=customerDetails&customerNo=".$customer['customer_id']."' class='btn btn-primary'>Details</a></td>
            </tr>";
            }
            $customersFiltered .= "</tbody></table>";
        } else {
            $message = '<p class="text-danger">Sorry, your search did not match any customer.</p>';
        }
        include '../view/sf-customers-filtered.php';
        break;

    default:
        $customers = getCustomers();
        if (count($customers) > 0) {
            $customersList = "<table class='table'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope='col'>Name</th>
                                        <th>Tax ID</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>";
            foreach ($customers as $customer) {
                $customersList .= "<tr>
                                        <th scope='row'>" . $customer['customer_name'] . "</th>
                                        <td>" . $customer['customer_taxid'] . "</td>
                                        <td>" . $customer['customer_phone'] . "</td>
                                        <td>" . $customer['customer_email'] . "</td>
                                        <td><a href='../sf-customers/index.php?action=customerDetails&customerNo=".$customer['customer_id']."' class='btn btn-primary'>Details</a></td>
                                    </tr>";
            }
            $customersList .= "</tbody></table>";
        } else {
            $message = '<p class="bg-danger">Sorry, no customers were found.</p>';
        }
        include '../view/sf-customers.php';
        break;
}
