<div class="d-flex align-items-center">
    <div>
    <form class="needs-validation" action="../sf-customers/?" method="get">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label>Search by</label>
            </div>
            <div class="col-auto">
                <div class="input-group mb-2">
                <?php 
                    if(isset($customersOptionsList)){
                        echo $customersOptionsList;
                    } else if(isset($contactsOptionsList)){
                        echo $contactsOptionsList;
                    } else if (isset($addressesOptionsList)) {
                        echo $addressesOptionsList;
                    } else if (isset($requestsOptionsList)) {
                        echo $requestsOptionsList;
                    }
                ?>
                </div>
            </div>
            <div class="col-auto">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="filter_value" name="filter_value" placeholder="(e.g. Amazon)"
                    <?php if (isset($userInput)){echo "value=$userInput";}?> required autofocus>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Apply</button>
                <input type="hidden" name="action" value="search">
            </div>
        </div>
    </form>
    </div>
<div class="ml-1 mb-2"><a href="../sf-customers" class="btn btn-secondary">Clear search</a></div>
</div>
<small id="searchHelpMessage" class="text-muted mb-5">This search box is case sentive, meaning that 'A' will not be treated as 'a' and viceversa.</small>