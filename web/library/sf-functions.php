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
                                        <td><a href='../sf-customers/index.php?action=details&customerNo=".$customer['customer_id']."' class='btn btn-info'>Details</a></td>
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

?>
