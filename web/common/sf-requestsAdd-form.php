<form class="col-10 my-5 mx-auto" action="../sf-requests/?" method="post">
    <div class="form-group row">
        <label for="customerNo" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
            <?php if (isset($customersList)) { echo $customersList; } ?>
            <small id="companyHelp" class="form-text text-muted">e.g. Amazon</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="contactNo" class="col-sm-2 col-form-label">Company contact</label>
        <div class="col-sm-10">
            <select name="contactNo" id="contactNo" class="form-control" required>
                <option value="">Select a Contact</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="details" class="col-sm-2 col-form-label">Request Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="requestDetails" name="details" aria-describedby="detailsHelp" rows="10" required></textarea>
            <small id="detailsHelp" class="form-text text-muted">Describe the product/service to quote.</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="customerNo" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
            <?php if (isset($customersList)) { echo $customersList; } ?>
            <small id="companyHelp" class="form-text text-muted">e.g. Amazon</small>
        </div>
    </div>
    <div class="form-group row">
        <label for="dateDelivery" class="col-sm-2 col-form-label">Delivery Date</label>
        <div class="col-sm-10">
            <input class="form-control" type="date" id="dateDeliveryInput" name="dateDelivery">
            <small id="dateDeliveryHelp" class="form-text text-muted">Provide the expected delivery date for the quote.</small>
        </div>
    </div>
    <div class="col-8 my-2 mx-auto p-0">
        <button type="submit" class="w-100 btn btn-primary">Submit</button>
        <input type="hidden" name="action" value="insertRequest">
    </div>

</form>