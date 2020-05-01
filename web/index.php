<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head.php';?>
    </head>
    <body>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php';?>
        <main role="main" class=".container-fluid">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="img/1280px-IPhone_SE_2.png" class="img-fluid">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>Why Upgrade</h1>
          <p>Better perfomance for games and work. Use those two sim cards finally. Get more battery life and faster WiFi speeds.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Buy now</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
    <img src="img/iphone-se-5050777_1280.png">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
      <div class="container">
        <div class="carousel-caption text-primary text-right">
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
      <img src="img/431px-Apple_A13_Bionic.jpg" class="featurette-image img-fluid mx-auto">
    </div>
  </div>

  <hr class="featurette-divider">
  <!-- /END THE FEATURETTES -->

</div><!-- /.container -->

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php';?>
        </main>
        <script src="js/jquery-3.5.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        </body>
</html>