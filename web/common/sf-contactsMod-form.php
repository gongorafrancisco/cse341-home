<form class="col-10 my-5 mx-auto" action="../sf-contacts/index.php" method="post">
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Contact Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" <?php if(isset($contactInfo['0']['contact_name'])){ echo "value='".$contactInfo['0']['contact_name']."'";}?> aria-describedby="nameHelp" maxlength="50" required>
                    <small id="nameHelp" class="form-text text-muted">e.g. John Harris</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="customerNo" class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                    <?php if(isset($customersList)){echo $customersList;} ?>
                    <small id="companyHelp" class="form-text text-muted">e.g. Amazon</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="department" name="department" <?php if(isset($contactInfo['0']['contact_department'])){ echo "value='".$contactInfo['0']['contact_department']."'";}?> aria-describedby="departmentHelp" maxlength="50" required>
                    <small id="departmentlHelp" class="form-text text-muted">e.g. Management</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" <?php if(isset($contactInfo['0']['contact_phone'])){ echo "value='".$contactInfo['0']['contact_phone']."'";}?> aria-describedby="phoneHelp">
                    <small id="phonelHelp" class="form-text text-muted">e.g. 6782345670 (for multiple numbers separate it with a comma)</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" <?php if(isset($contactInfo['0']['contact_email'])){ echo "value='".$contactInfo['0']['contact_email']."'";}?> aria-describedby="emailHelp">
                    <small id="emaillHelp" class="form-text text-muted">e.g. john.harris@amazon.com (for multiple email addresses separate it with a comma)</small>
                </div>
            </div>
            <div class="col-8 my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-primary">Update Contact</button>
                <input type="hidden" name="action" value="updateContact">
                <input type="hidden" name="contactNo" <?php if(isset($contactInfo['0']['contact_id'])){ echo "value='".$contactInfo['0']['contact_id']."'";}?>>
            </div>

        </form>