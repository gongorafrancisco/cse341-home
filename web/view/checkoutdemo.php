<!doctype html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Checkout Demo</title>
         <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main class="container-fluid">
        <h2 class="invisible">1</h2>
        <div>
            <a href="cartdemo.php">
        <svg class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
</svg>Back to cart</a>
        </div>
             <h1 class="display-4 text-center">Checkout Demo</h1>
              <h2 class="invisible">1</h2>
    <div class="container-md">
      <h4 class="mb-3">Shipping address</h4>
      <form class="needs-validation" action="../proveprojects/index.php" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <div class="row">
        <div class="col-md-9 mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
        </div>
        <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Complete purchase</button>
        <input type="hidden" name="action" value="complete">
      </form>
    </div>
  </div>

        </main>    
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </body>
</html>