<form class="col-10 my-5 mx-auto" action="../sf-customers/?" method="post">
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Official Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="officialName" name="officialName" <?php if(isset($customerInfo['0']['customer_name'])){ echo "value='".$customerInfo['0']['customer_name']."'";}?> readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Tax ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="taxID" name="taxID" <?php if(isset($customerInfo['0']['customer_taxid'])){ echo "value='".$customerInfo['0']['customer_taxid']."'";}?> readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" <?php if(isset($customerInfo['0']['customer_phone'])){ echo "value='".$customerInfo['0']['customer_phone']."'";}?> readonly >
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" <?php if(isset($customerInfo['0']['customer_email'])){ echo "value='".$customerInfo['0']['customer_email']."'";}?> readonly>
                </div>
            </div>
            <div class="col-8 my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-danger">Confirm Customer Deletion</button>
                <input type="hidden" name="action" value="confirmDeletion">
                <input type="hidden" name="customerNo" <?php if(isset($customerInfo['0']['customer_id'])){ echo "value='".$customerInfo['0']['customer_id']."'";}?>>
            </div>

        </form>