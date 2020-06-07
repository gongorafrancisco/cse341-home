<?php
if (!isset($_SESSION['member_name'])) {
    header("Location: /salesfu");
    die();
}
$pageName = "Confirm request #".$requestInfo['0']['request_id']." deletion";
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Add Request| Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navt.php'; ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navl.php'; ?>
            <div class="col h-100 py-4 px-3">
                <div class="col-10 mt-5 mx-auto alert alert-info" role="alert">
                    The associated quote will be removed by deleting a request. This change is permanent.
                    <a class="alert-link mx-2" href="<?php if(isset($requestInfo['0']['request_id'])){ echo "../sf-requests/?action=modify&requestNo=".$requestInfo['0']['request_id'];}?>">Modify instead</a><a class="alert-link mx-2" href="../sf-requests">Cancel</a>
                </div>
                <?php if (isset($message)) {
                    echo "<div class='col-10 mt-2 mx-auto alert alert-info' role='alert'>" . $message . "</div>";
                } ?>
                <form class="col-10 my-5 mx-auto" action="../sf-requests/?" method="post">
                    <div class="form-group row">
                        <label for="cuustomerNo" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                        <select name="customerNo" id="customerNo" class="form-control" readonly>
                                <?php 
                                    if(isset($requestInfo['0']['customer_id']) && isset($requestInfo['0']['customer_name'])) {
                                        echo "<option value='".$requestInfo['0']['customer_id']."'>".$requestInfo['0']['customer_name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactNo" class="col-sm-2 col-form-label">Company contact</label>
                        <div class="col-sm-10">
                            <select name="contactNo" id="contactNo" class="form-control" readonly>
                                <?php 
                                    if(isset($requestInfo['0']['contact_id']) && isset($requestInfo['0']['contact_name'])) {
                                        echo "<option value='".$requestInfo['0']['contact_id']."'>".$requestInfo['0']['contact_name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="details" class="col-sm-2 col-form-label">Request Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="requestDetails" name="details" aria-describedby="detailsHelp" rows="10" readonly><?php if(isset($requestInfo['0']['request_details'])) {echo $requestInfo['0']['request_details'];}?></textarea>
                            
                        </div>
                    </div>
                    <div class="col-8 my-2 mx-auto p-0">
                        <button type="submit" class="w-100 btn btn-primary">Confirm request deletion</button>
                        <input type="hidden" name="action" value="confirmDeletion">
                        <input type="hidden" name="requestNo" <?php if(isset($requestInfo['0']['request_id'])){ echo "value='".$requestInfo['0']['request_id']."'";}?>>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts-req-addForm.js"></script>
</body>

</html>