<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body id="dashboard-body h-100">
    <div class="container-fluid bg-dark p-3">
        <div class="row">
            <div class="col-sm text-light">
                Sales FU | Dashboard
            </div>
            <div class="col-sm text-light text-center">
                Seach Bar Place holder
            </div>
            <div class="col-sm text-light text-right">
                <a href="/" class="mr-3">Back to home</a>
                <a href="#" class="mr-2">Signout</a>
            </div>
        </div>
    </div>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-2 p-1 h-100 py-4 px-3">
                <div class="btn-group dropright">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customers
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../salesfu/customers">View All</a>
                        <a class="dropdown-item" href="#">Add Customer</a>
                        <a class="dropdown-item" href="#">View Contacts</a>
                        <a class="dropdown-item" href="#">Add Contact</a>
                        <a class="dropdown-item" href="#">View Addresses</a>
                        <a class="dropdown-item" href="#">Add Addresses</a>
                    </div>
                </div>

            </div>

            <div class="col bg-light h-100 py-4 px-3">

            </div>
        </div>
    </div>

    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>