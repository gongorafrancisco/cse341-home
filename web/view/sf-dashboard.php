<?php
if (!isset($_SESSION['member_name'])) {
    header("Location: /salesfu");
    die();
}
$pageName = "Dashboard";
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navt.php'; ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navl.php'; ?>
            <div class="col h-100 py-4 px-3">
                <div class="col mb-5">
                    <h5 class="text-info">Process to create a request for a new Company</h5>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">Add a Customer -></li>
                        <li class="list-group-item">Fill the form fields</li>
                        <li class="list-group-item">Add a Contact -></li>
                        <li class="list-group-item">Fill the form fields</li>
                        <li class="list-group-item">Add a Request -></li>
                        <li class="list-group-item">Fill the form fields</li>
                        <li class="list-group-item">End</li>
                    </ul>
                </div>
                <div class="col my-5">
                    <h5 class="text-info">Process to create a request for an existing Company</h5>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">Add a Request -></li>
                        <li class="list-group-item">Fill the form fields</li>
                        <li class="list-group-item">End</li>
                    </ul>
                </div>
                <div class="col my-5">
                    <h5 class="text-info">Process to complete a request / create a new quote</h5>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">View all Requests -></li>
                        <li class="list-group-item">Click on the "Complete" button -></li>
                        <li class="list-group-item">Fill the all the quote fields</li>
                        <li class="list-group-item">End</li>
                    </ul>
                </div>
                <div class="col my-5">
                    <h5 class="text-info">Pending functionality</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Display key indicators for not completed requests, completed requests, new requests at this Dashboard page.</li>
                        <li class="list-group-item">Display all related contacts, requests and quotes on the "Customer Details" page.</li>
                        <li class="list-group-item">Display a link for "Details" on the Customers Page that goes to a page with all Contact's quote requests and quotes.</li>
                        <li class="list-group-item">Display a dynamic help message on the search box at the Quote Requests page.</li>
                        <li class="list-group-item">Display details from the quote request like the actual items request content and the related quote.</li>
                        <li class="list-group-item">Display date of completition, quote# on the Quote Request Page based on the complet status.</li>
                        <li class="list-group-item">Display a link for "Details" on the Quotes Page that goes to a page with details like the subtotal, taxes, and actual quoted items.</li>
                        <li class="list-group-item">Activate functionality for "Modify" and "Delete" buttons at the Quotes Page.</li>
                        <li class="list-group-item">Activate functionality for filter quotes.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>