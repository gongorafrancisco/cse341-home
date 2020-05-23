<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Form Handler Demo</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head-tp.php';?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header-tp.php';?>
        <h6 class="invisible">1</h6>
        <main class="container-md">    
        <h1 class="display-4 text-center">Form Handling Demo</h1>
        <h6 class="invisible">1</h6>
        <div class="container-md">
            <p class="h4 text-center">Welcome <span class="h4 text-muted"> <?php echo $name; ?> </span></p>
            <p class="h4 text-center">Your email address is <span class="h4 text-muted"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></span></a></p>
            <p class="h4 text-center">Your major is: <span class="h4 text-muted"> <?php echo $majorSelection; ?></span></p>
            <p class="h4 text-center">You have been in the following places: <span class="h4 text-muted"> <?php echo $placesMessage; ?></span></p>
            <blockquote class="blockquote text-center">
                <p class="mb-0 display-4">"<?php echo $comments;  ?>"</p>
                <footer class="blockquote-footer"><?php echo $name; ?></footer>
            </blockquote>
        </div>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer-tp.php';?>
    </body>
</html>