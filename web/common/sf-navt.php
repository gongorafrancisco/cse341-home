<div class="d-flex justify-content-between bg-dark p-3">
        <div>
            <a href="../salesfu/?action=dashboard">Sales FU | Dashboard</a>
        </div>
        <div class="text-light">
            <?php if(isset($pageName)){ echo $pageName;}?>
        </div>
        <div>
            <?php if(isset($_SESSION['member_name'])){ echo "<span class='text-light mr-3'>Welcome ".$_SESSION['member_name']."</span>"; } ?>
            <a class="text-primary mr-1" href="../salesfu/?action=logout">Sing out</a>
        </div>
</div>