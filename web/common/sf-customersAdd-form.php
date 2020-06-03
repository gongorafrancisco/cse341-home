<form class="col-10 my-5 mx-auto" action="../sf-customers/index.php" method="post">
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Official Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="officialName" name="officialName" aria-describedby="officialNameHelp" maxlength="50" required autofocus>
                    <small id="officialNamelHelp" class="form-text text-muted">e.g. Amazon Inc.</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Tax ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="taxID" name="taxID" aria-describedby="taxIDHelp" maxlength="13" required>
                    <small id="taxIDlHelp" class="form-text text-muted">e.g. AMA010203BN2</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
                    <small id="phonelHelp" class="form-text text-muted">e.g. 6782345670 (for multiple numbers separate it with a comma)</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    <small id="emaillHelp" class="form-text text-muted">e.g. info@amazon.com (for multiple email addresses separate it with a comma)</small>
                </div>
            </div>
            <div class="col-8 my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-primary">Add New Customer</button>
                <input type="hidden" name="action" value="insertCustomer">
            </div>

        </form>