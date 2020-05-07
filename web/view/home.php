<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body class="d-flex flex-column h-100">

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main role="main">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="../img/iphone-se-5050777_1280.png" alt="iPhone SE thumbnail">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
      <div class="container">
        <div class="carousel-caption text-left text-info">
          <h1>Why Upgrade</h1>
          <p>Better perfomance for games and work. Use those two sim cards finally.<br>
           Get more battery life and faster WiFi speeds.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Buy now</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
      <div class="container">
        <div class="carousel-caption text-info">
          <h1>Tech Specs</h1>
          <p>Better display. Faster chip. Enhanced camera. Water resistant. Want more?</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <div class="row featurette">
  <div class="col"></div>  
  <div class="col-md-6">
      <h2 class="featurette-heading">Our last chip so far. <span class="text-muted">It’ll blow your mind.</span></h2>
      <p class="lead">With the new (as for 2020) A13 Bionic chip you can now run any app or game smoothly and with greater efficiency.</p>
    </div>
    <div class="col-md-5">
      <img src="../img/431px-Apple_A13_Bionic.jpg" class="featurette-image img-fluid mx-auto" alt="Apple A13 Bionic Chip">
    </div>
  </div>

  <hr class="featurette-divider">
  <!-- /END THE FEATURETTES -->
  </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </body>
</html>