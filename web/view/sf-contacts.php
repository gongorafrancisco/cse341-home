<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Contacts | Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navt.php'; ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navl.php'; ?>
            <div class="col h-100 py-4 px-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-contactsFilter-form.php'; ?>
                <?php if (isset($message)){echo "<div class='alert alert-info' role='alert'>".$message."</div>";}?>
                <div class="h-100 my-4 overflow-auto">
                    <?php if (isset($contactsList)) {
                        echo $contactsList;
                    } ?>
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
<?php unset($_SESSION['message']); ?>