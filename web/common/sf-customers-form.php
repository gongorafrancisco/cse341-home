<form class="needs-validation" action="../sf-customers/index.php" method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="inlineFormInputGroup" name="filter_value" placeholder="Write something" required>
                                <small id="filterHelp" class="form-text text-muted">The search box is case sensitive, meaning that A is not the same than a.</small>
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Apply</button>
                            <input type="hidden" name="action" value="filterCustomers">
                        </div>
                    </div>
                </form>