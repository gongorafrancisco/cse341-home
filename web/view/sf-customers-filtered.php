<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Customers | Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body id="dashboard-body h-100">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navt.php'; ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navl.php'; ?>
            <div class="col bg-light h-100 py-4 px-3">
                <form class="needs-validation" action="../salesfu/customers/index.php" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <select class="custom-select">
                                <option selected>Filter by</option>
                                <option name="filter" value="customer_name">Name</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="filter_value" placeholder="Write something">
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Apply</button>
                            <input type="hidden" name="action" value="filterCustomers">
                        </div>
                    </div>
                </form>
                <?php
                if (isset($customersFiltered)) {
                    echo $customersFiltered;
                }
                ?>

            </div>
        </div>
    </div>

    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>