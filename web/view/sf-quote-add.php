<?php
if (!isset($_SESSION['member_name'])) {
    header("Location: /salesfu");
    die();
}
$pageName = "Add a Quote";
?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Add Quote| Sales Follow UP</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navt.php'; ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/sf-navl.php'; ?>
            <div class="col h-100 py-4 px-3">
                <div class="col-10 mt-5 mx-auto alert alert-info" role="alert">
                    All fields are required.
                    <a class="alert-link mx-3" href="../sf-requests">Back to Requests</a>
                    <a class="alert-link mx-3" href="../sf-quotes">Go to Quotes</a>
                </div>
                <?php if (isset($message)) {
                    echo "<div class='col-10 mt-2 mx-auto alert alert-info' role='alert'>" . $message . "</div>";
                } ?>
                <form class="col-10 my-5 mx-auto" action="../sf-quotes/?" method="post">
                    
                <div class="form-group row">
                        <label for="requestNo" class="col-sm-2 col-form-label">Request #</label>
                        <div class="col-sm-10">
                            <select name="requestNo" id="requestNo" class="form-control" readonly>
                                <?php if(isset($requestNo)){ 
                                    echo "<option value='".$requestNo."'>".$requestNo."</option>"; } 
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="customerNo" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                        <select name="customerNo" id="customerNo" class="form-control" readonly>
                            <?php if(isset($customerNo) && isset($customerName)){ 
                                    echo "<option value='".$customerNo."'>".$customerName."</option>"; } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactNo" class="col-sm-2 col-form-label">Company contact</label>
                        <div class="col-sm-10">
                            <select name="contactNo" id="contactNo" class="form-control" readonly>
                                <?php if(isset($contactNo) && isset($contactName)){ 
                                    echo "<option value='".$contactNo."'>".$contactName."</option>"; } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="requestDetails" class="col-sm-2 col-form-label">Request Description</label>
                        <div class="col-sm-10">
                        <?php 
                            if(isset($requestDetails)){ 
                                    echo "<textarea class='form-control' id='requestDetails' name='requestDetails' rows='5' readonly>".$requestDetails."</textarea>"; 
                                } 
                        ?>
                            <small id="requestDetailsHelp" class="form-text text-muted">Products/services requested.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="details" class="col-sm-2 col-form-label">Quote Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="quoteDetails" name="details" aria-describedby="detailsHelp" rows="10" required autofocus></textarea>
                            <small id="detailsHelp" class="form-text text-muted">List the products/services quoted.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subtotal" class="col-sm-2 col-form-label">Quote Subtotal $</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quoteSubtotal" name="subtotal" aria-describedby="subtotalHelp" min=1 step="any" required>
                            <small id="subtotalHelp" class="form-text text-muted">List the products/services quoted.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="taxes" class="col-sm-2 col-form-label">Quote Taxes $</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quotetaxes" name="taxes" aria-describedby="taxesHelp" min=1 step="any" required>
                            <small id="taxesHelp" class="form-text text-muted">List the products/services quoted.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total" class="col-sm-2 col-form-label">Quote Total $</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quotetotal" name="total" aria-describedby="totalHelp" min=1 step="any" required>
                            <small id="totalHelp" class="form-text text-muted">List the products/services quoted.</small>
                        </div>
                    </div>
                    <div class="col-8 my-2 mx-auto p-0">
                        <button type="submit" class="w-100 btn btn-primary">Submit</button>
                        <input type="hidden" name="action" value="insertQuote">
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