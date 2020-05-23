<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Scripture Resources</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main class="container-md my-5">    
        <h1 class="display-4 text-center">Scripture Resources</h1>
        <h6 class="invisible">1</h6>

                    <?php
                        if(isset($scripturesList)){
                            echo $scripturesList;
                        }
                    ?>

        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
    </body>
</html>