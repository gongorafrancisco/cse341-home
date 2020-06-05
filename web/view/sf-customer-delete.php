<?php
if (!isset($_SESSION['member_name'])) { 
    header("Location: /salesfu");
    die();
}
if(isset($customerInfo['0']['customer_name'])){ 
    $pageName = "Confirm Customer ".$customerInfo['0']['customer_name']." Deletion";
}
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Customer Deletion| Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navt.php'; ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navl.php'; ?>
            <div class="col h-100 py-4 px-3">
                
                <div class="col-10 mt-5 mx-auto alert alert-danger" role="alert">
                    All contacts and addresses will be removed by deleting a customer. This change is permanent.
                    <a class="alert-link mx-2" href="<?php if(isset($customerInfo['0']['customer_id'])){ echo "../sf-customers/?action=modify&customerNo=".$customerInfo['0']['customer_id'];}?>">Modify instead</a><a class="alert-link mx-2" href="../sf-customers">Cancel</a>
                </div>
                <?php if (isset($message)){echo "<div class='col-10 mt-2 mx-auto alert alert-info' role='alert'>".$message."</div>";}?>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-customersDel-form.php'; ?> 
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>