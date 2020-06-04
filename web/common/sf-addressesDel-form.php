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
                    <textarea class="form-control" id="address" name="address" aria-describedby="addressHelp" rows="2" readonly><?php if(isset($addressInfo['0']['customer_address'])){ echo $addressInfo['0']['customer_address'];}?></textarea>
                    <small id="addressHelp" class="form-text text-muted">e.g. Fifth Av. 212, NY 12931</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="shipping" class="col-sm-2 col-form-label">Use for shipping?</label>
                <div class="col-sm-10">
                    <?php if(isset($shippingBoolean)){echo $shippingBoolean;} ?>
                </div>
            </div>
            <div class="col-8 my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-primary">Confirm address deletion</button>
                <input type="hidden" name="action" value="confirmDeletion">
                <input type="hidden" name="addressNo" <?php if(isset($addressInfo['0']['address_id'])){ echo "value='".$addressInfo['0']['address_id']."'";}?>>
                <input type="hidden" name="customer" <?php if(isset($addressInfo['0']['customer_name'])){ echo "value='".$addressInfo['0']['customer_name']."'";}?>>
            </div>

        </form>