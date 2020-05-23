<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Customers</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main class="container-md my-5">    
        <h1 class="display-4 text-center">Scripture Resources</h1>

                    <?php
                        if(isset($customersList)){
                            echo $customersList;
                        }
                    ?>

        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
    </body>
</html>