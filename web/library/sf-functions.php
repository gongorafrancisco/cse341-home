<?php

function checkEmail($email) {
  $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
  return $validEmail;
}

function checkPassword($password) {
    // Check the password for a minimum of 7 characters,
    // at least one 1 capital letter, at least 1 number and
    // at least 1 special character
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){7,}$/';
  return preg_match($pattern, $password);
}

function customersBuilder($customers){
    $list = "<table class='table text-center'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th class='text-left' scope='col'>Name</th>
                                        <th>Tax ID</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Details</th>
                                        <th class> Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
            foreach ($customers as $customer) {
                $list .= "<tr>
                                        <th class='text-left' scope='row'>" . $customer['customer_name'] . "</th>
                                        <td>" . $customer['customer_taxid'] . "</td>
                                        <td>" . $customer['customer_phone'] . "</td>
                                        <td>" . $customer['customer_email'] . "</td>
                                        <td><a href='../sf-customers/?action=details&customerNo=".$customer['customer_id']."' class='link text-info'>Details</a></td>
                                        <td><a href='../sf-customers/?action=modify&customerNo=".$customer['customer_id']."' class='btn btn-primary'>Modify</a><a href='../sf-customers/?action=delete&customerNo=".$customer['customer_id']."' class='ml-3 btn btn-danger'>Delete</a></td>
                                    </tr>";
            }
            $list .= "</tbody></table>";
            return $list;
}

function generalInfoBuilder($customerInfo) {
    $giTable = "<div class='container-fluid rounded py-3 bg-light'><h5>Customer General Info</h5>
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
                $giTable .= "<tr>
                <th scope='row'>" . $detail['customer_id'] . "</th>
                <td>" . $detail['customer_name'] . "</td>
                <td>" . $detail['customer_taxid'] . "</td>
                <td>" . $detail['customer_phone'] . "</td>
                <td>" . $detail['customer_email'] . "</td>
            </tr>";
            }
            $giTable .= "</tbody></table></div>";
        return $giTable;
}

function selectCustomersElement($customers){
    $element = "<select class='form-control' name='customerNo' id='customerNo' required autofocus>";
    $element .= "<option>Choose a Company</option>";
    foreach ($customers as $customer) {
        $element .= "<option value='".$customer['customer_id']."'>".$customer['customer_name']."</option>";
    }
    $element .= "</select>";
    return $element;
}

function selectCustomersElementModify($customers, $selection){
    $element = "<select class='form-control' name='customerNo' id='customerNo' required autofocus>";
    $element .= "<option>Choose a Company</option>";
    foreach ($customers as $customer) {
        $element .= "<option value='".$customer['customer_id']."'";
        if(isset($selection)){
            if($customer['customer_id']===$selection){
                $element .= " selected ";
            }
        }
        $element .= ">".$customer['customer_name']."</option>";
    }
    $element .= "</select>";
    return $element;
}

function selectCustomersElementDelete($customers, $selection){
    $element = "<select class='form-control' name='customerNo' id='customerNo' disabled>";
    $element .= "<option>Choose a Company</option>";
    foreach ($customers as $customer) {
        $element .= "<option value='".$customer['customer_id']."'";
        if(isset($selection)){
            if($customer['customer_id']===$selection){
                $element .= " selected ";
            }
        }
        $element .= ">".$customer['customer_name']."</option>";
    }
    $element .= "</select>";
    return $element;
}

function contactsBuilder($contacts) {
    $list = "<table class='table text-center'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th class='text-left' scope='col'>Name</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
            foreach ($contacts as $contact) {
                $list .= "<tr>
                                        <th class='text-left' scope='row'>" . $contact['contact_name'] . "</th>
                                        <td>" . $contact['customer_name'] . "</td>
                                        <td>" . $contact['contact_department'] . "</td>
                                        <td>" . $contact['contact_phone'] . "</td>
                                        <td>" . $contact['contact_email'] . "</td>
                                        <td><a href='../sf-contacts/?action=modify&contactNo=".$contact['contact_id']."' class='btn btn-primary'>Modify</a><a href='../sf-contacts/?action=delete&contactNo=".$contact['contact_id']."' class='ml-3 btn btn-danger'>Delete</a></td>
                                    </tr>";
            }
            $list .= "</tbody></table>";
            return $list;
}

function selectSearchElement($options, $selection) {
    
    $element = "<select class='form-control' name='filter_option' id='select_options' required>";
    $element .= "<option value=''>Select a filter</option>";
    foreach ($options as $key => $option){
        $element .= "<option value='".$key."'";
        if(isset($selection)){
            if($key === $selection){
                $element .= " selected ";
            }
        }
        $element .= ">".$option."</option>";
    }
    $element .= "</select>";
        return $element;
}

function addressesBuilder($addresses) {
    $table = "<table class='table text-center'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th class='text-left' scope='col'>No.</th>
                                        <th>Company</th>
                                        <th>Address</th>
                                        <th>Shipping Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
            foreach ($addresses as $address) {
                $table .= "<tr>
                                        <th class='text-left' scope='row'>" . $address['address_id'] . "</th>
                                        <td>" . $address['customer_name'] . "</td>
                                        <td>" . $address['customer_address'] . "</td>
                                        <td>" . $address['shipping_address'] . "</td>
                                        <td><a href='../sf-addresses/?action=modify&addressNo=".$address['address_id']."' class='btn btn-primary'>Modify</a><a href='../sf-addresses/?action=delete&addressNo=".$address['address_id']."' class='ml-3 btn btn-danger'>Delete</a></td>
                                    </tr>";
            }
            $table .= "</tbody></table>";
            return $table;
}

function shippingAddressModify($array, $selection){
    $element = "<select class='form-control' name='shipping' id='inlineFormInputGroup' required>";
    $element .= "<option>Choose an option</option>";
    foreach ($array as $b){
        $element .= "<option value='".$b."'";
        if(isset($selection)){
            if($b===$selection){
                $element .= " selected ";
            }
        }
        $element .= ">".$b."</option>";
    }
    $element .= "</select>";
    return $element;
}

function shippingAddressDelete($array, $selection){
    $element = "<select class='form-control' name='shipping' id='inlineFormInputGroup' disabled>";
    $element .= "<option>Choose an option</option>";
    foreach ($array as $b){
        $element .= "<option value='".$b."'";
        if(isset($selection)){
            if($b===$selection){
                $element .= " selected ";
            }
        }
        $element .= ">".$b."</option>";
    }
    $element .= "</select>";
    return $element;
}

function requestsBuilder($requests){
    $table = "<table class='table text-center'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope='col'>No.</th>
                                        <th>Date of Request</th>
                                        <th>Company</th>
                                        <th>Contact</th>
                                        <th>Details</th>
                                        <th>Completed</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>";
            foreach ($requests as $request) {
                $table .= "<tr>
                                        <th scope='row'>" . $request['request_id'] . "</th>
                                        <td>" . parse_timestamp($request['request_date']) . "</td>
                                        <td>" . $request['customer_name'] . "</td>
                                        <td>" . $request['contact_name'] . "</td>
                                        <td><a href='../sf-requests/?action=details&requestNo=".$request['request_id']."' class='link text-info'>Details</a></td>
                                        <td>" . $request['request_complete'] . "</td>";
                                    if ($request['request_complete'] == "Yes"){
                                        $table .= "<td><a href='../sf-requests/?action=delete&requestNo=".$request['request_id']."' class='btn btn-danger'>Delete</a></td>";
                                    } else {
                                        $table .= "<td><a href='../sf-requests/?action=modify&requestNo=".$request['request_id']."' class='btn btn-primary mr-1'>Modify</a><a href='../sf-quotes/?action=create&requestNo=".$request['request_id']."' class='btn btn-success ml-1'>Complete</a></td>";
                                    }
                                    $table .= "</tr>";
            }
            $table .= "</tbody></table>";
            return $table;
}

function quotesBuilder($quotes) {
    $table = "<table class='table text-center'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope='col'>No.</th>
                                        <th>Date</th>
                                        <th>Company</th>
                                        <th>Contact</th>
                                        <th>Request No</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>";
            foreach ($quotes as $quote) {
                $table .= "<tr>
                                        <th scope='row'>" . $quote['quote_id'] . "</th>
                                        <td>" . parse_timestamp($quote['quote_date']) . "</td>
                                        <td>" . $quote['customer_name'] . "</td>
                                        <td>" . $quote['contact_name'] . "</td>
                                        <td>" . $quote['request_id'] . "</td>
                                        <td>$" . $quote['quote_total'] . "</td>
                                        <td><a href='../sf-quotes/?action=modify&quoteNo=".$quote['quote_id']."' class='btn btn-primary mr-1'>Modify</a><a href='../sf-quotes/?action=delete&rquoteNo=".$quote['request_id']."' class='btn btn-danger ml-1'>Delete</a></td>";
                                    }
                                    $table .= "</tr>";
            $table .= "</tbody></table>";
            return $table;
}

function parse_timestamp($timestamp, $format = 'd-m-Y h:i:s a') {
    return date($format, strtotime($timestamp));
}
?>