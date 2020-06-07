<div class="d-flex align-items-center">
    <div>
    <form class="needs-validation" 
                <?php 
                    if(isset($customersOptionsList)){
                        echo "action='../sf-customers/?'";
                    } else if(isset($contactsOptionsList)){
                        echo "action='../sf-contacts/?'";
                    } else if (isset($requestsOptionsList)) {
                        echo "action='../sf-requests/?'";
                    } else if (isset($quotesOptionsList)) {
                        echo "action='../sf-quotes/?'";
                    } 
                ?> 
                method="get">
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
                    } else if (isset($requestsOptionsList)) {
                        echo $requestsOptionsList;
                    } else if (isset($quotesOptionsList)) {
                        echo $quotesOptionsList;
                    }
                ?>
                </div>
            </div>
            <div class="col-auto">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="filter_value" name="filter_value"
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
<div class="ml-1 mb-2">
<?php 
                    if(isset($customersOptionsList)){
                        echo "<a href='../sf-customers' class='btn btn-secondary'>Clear search</a>";
                    } else if(isset($contactsOptionsList)){
                        echo "<a href='../sf-contacts' class='btn btn-secondary'>Clear search</a>";
                    } else if (isset($requestsOptionsList)) {
                        echo "<a href='../sf-requests' class='btn btn-secondary'>Clear search</a>";
                    } else if (isset($quotesOptionsList)) {
                        echo "<a href='../sf-quotes' class='btn btn-secondary'>Clear search</a>";
                    } 
                ?> 
</div>
</div>
<small id="searchHelpMessage" class="text-muted mb-5">This search box is case sentive, meaning that 'A' will not be treated as 'a' and viceversa.</small>