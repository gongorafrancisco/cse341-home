<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Confirmantion</title>
         <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="container-fluid my-3">
        <h2 class="invisible">1</h2>
        <div>
            <a href="../proveprojects/index.php?action=backToStore">
        <svg class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
</svg>Back to store</a>
        </div>
             <h1 class="display-4 text-center">Confirmation</h1>
              <h2 class="invisible">1</h2>
        <div class="container-md">
            <h5 class='h5'>Ship to</h5>
                    <?php
                        if(isset($customerSummary)){
                            echo $customerSummary;
                        }
                    ?>
                    <h2 class="invisible">1</h2>
                    <h5 class="h5">Purchase summary</h5>
                    <?php
                         if(isset($productSummary)){
                            echo $productSummary;
                          }
                    ?>
        </div>
        <h2 class="invisible">1</h2>
        </main>    
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </body>
</html>