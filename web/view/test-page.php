<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Test Page</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main class="container-md my-5">    
        <h1 class="display-4 text-center">Test Page</h1>
        <div class="col my-4 text-right p-0">
            
        </div>

                    <?php
                        if(isset($rowOutcome)){
                            echo 'the last inserted id is: ' . $rowOutcome;
                        }
                        echo $test;
                    ?>

        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
    </body>
</html>