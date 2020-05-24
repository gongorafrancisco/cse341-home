<form class="needs-validation" action="../sf-customers/index.php" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="filter_value" placeholder="Write something" required>
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Apply</button>
                            <input type="hidden" name="action" value="filterCustomers">
                        </div>
                    </div>
                </form>