<form class="col-10 my-5 mx-auto" action="../sf-addresses/?" method="post">

            <div class="form-group row">
                <label for="customerNo" class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                    <?php if(isset($customersList)){echo $customersList;} ?>
                    <small id="companyHelp" class="form-text text-muted">e.g. Amazon</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="address" name="address" aria-describedby="addressHelp" rows="2" required></textarea>
                    <small id="addressHelp" class="form-text text-muted">e.g. Fifth Av. 212, NY 12931</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="shipping" class="col-sm-2 col-form-label">Use for shipping?</label>
                <div class="col-sm-10">
                    <select class="form-control" name="shipping" id="inlineFormInputGroup" required>
                        <option value="">Choose an option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <div class="col-8 my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-primary">Add New Address</button>
                <input type="hidden" name="action" value="insertAddress">
            </div>

        </form>