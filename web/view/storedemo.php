<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Store Demo</title>
         <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main role="main" class="flex-shrink-0">
        <h2 class="invisible">1</h2>
            <div class="container-fluid text-right">
                <a href="../proveprojects/index.php?action=cart">
                View cart
                <svg class="bi bi-bag" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 001 1h10a1 1 0 001-1V5zM1 4v10a2 2 0 002 2h10a2 2 0 002-2V4H1z" clip-rule="evenodd"/>
                <path d="M8 1.5A2.5 2.5 0 005.5 4h-1a3.5 3.5 0 117 0h-1A2.5 2.5 0 008 1.5z"/>
                </svg>
                </a>
            </div>
  <h1 class="display-4 text-center">The iPhone Store</h1>
  <h2 class="invisible">1</h2>
<div class="container-lg">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">iPhone SE</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$499</h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Retina HD display</li>
          <li>Capacity 64GB</li>
          <li>A13 Bionic chip</li>
          <li>2 SIM Card support</li>
        </ul>
        <a class="btn btn-primary" href="../proveprojects/index.php?action=se">Add to cart</a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">iPhone 12</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$649</h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>5.4" OLED Display</li>
          <li>Capacity 128GB</li>
          <li>A14 chip</li>
          <li>2 camera system</li>
          <li>5G Support</li>
        </ul>
        <a class="btn btn-primary" href="../proveprojects/index.php?action=tw">Add to cart</a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">iPhone 12 Pro</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$999</h1>
        <ul class="list-unstyled mt-3 mb-4">
        <li>6.1" OLED Display</li>
          <li>Capacity 256GB</li>
          <li>A14 chip</li>
          <li>3 camera system + LiDIAR</li>
          <li>5G Support</li>
        </ul>
        <a class="btn btn-primary" href="../proveprojects/index.php?action=twp">Add to cart</a>
      </div>
    </div>
  </div>
        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </body>
</html>