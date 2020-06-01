<?php
function customersBuilder($customers){
    $list = "<table class='table'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope='col'>Name</th>
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
                                        <th scope='row'>" . $customer['customer_name'] . "</th>
                                        <td>" . $customer['customer_taxid'] . "</td>
                                        <td>" . $customer['customer_phone'] . "</td>
                                        <td>" . $customer['customer_email'] . "</td>
                                        <td><a href='../sf-customers/index.php?action=details&customerNo=".$customer['customer_id']."' class='link text-info'>Details</a></td>
                                        <td><a href='../sf-customers/index.php?action=modify&customerNo=".$customer['customer_id']."' class='btn btn-primary'>Modify</a><a href='../sf-customers/index.php?action=delete&customerNo=".$customer['customer_id']."' class='ml-3 btn btn-danger'>Delete</a></td>
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
    $element = "<select class='form-control' name='customerNo' id='customerNo' required>";
    $element .= "<option>Choose a Company</option>";
    foreach ($customers as $customer) {
        $element .= "<option value='".$customer['customer_id']."'>".$customer['customer_name']."</option>";
    }
    $element .= "</select>";
    return $element;
}

function selectCustomersElementModify($customers, $selection){
    $element = "<select class='form-control' name='customerNo' id='customerNo' required>";
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
    $list = "<table class='table'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope='col'>Name</th>
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
                                        <th scope='row'>" . $contact['contact_name'] . "</th>
                                        <td>" . $contact['customer_name'] . "</td>
                                        <td>" . $contact['contact_department'] . "</td>
                                        <td>" . $contact['contact_phone'] . "</td>
                                        <td>" . $contact['contact_email'] . "</td>
                                        <td><a href='../sf-contacts/index.php?action=modify&contactNo=".$contact['contact_id']."' class='btn btn-primary'>Modify</a><a href='../sf-contacts/index.php?action=delete&contactNo=".$contact['contact_id']."' class='ml-3 btn btn-danger'>Delete</a></td>
                                    </tr>";
            }
            $list .= "</tbody></table>";
            return $list;
}

function selectSearchElement($options, $selection) {
    
    $element = "<select class='form-control' name='filter_option' id='inlineFormInputGroup' required>";
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

?>
