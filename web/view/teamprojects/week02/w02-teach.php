<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8" />
    <title>Week 02 Teach Team Activity</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head-tp.php';?>
  </head>
  <body class="d-flex flex-column h-100">
  <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header-tp.php';?>
  <h2 class="invisible">1</h2>
  <main class="container-fluid">
   <h1 class="h1 text-center">
     02 Teach : Team Activity
    <small class="text-muted">by Francisco Gongora</small>
   </h1>
  <h2 class="invisible">1</h2>
  <h2 class="invisible">2</h2>
  <div class="row">
    <div class="col"></div>
     <div id="con-01" class="col p-3 mb-2 bg-info text-white"><p class="text-center">Box One</p></div>
     <div class="col"></div>
     <div id="con-02" class="col p-3 mb-2 bg-secondary text-white"><p class="text-center">Box Two</p></div>
      <div class="col"></div>
     <div id="con-03" class="col p-3 mb-2 bg-dark text-white"><p class="text-center">Box Three</p></div>
     <div class="col"></div>
    </div>
    <h2 class="invisible">1</h2>
    <h2 class="invisible">2</h2>
    <div class="row">
      <div class="col"></div>
      <div class="col-10">
    <button id="clickMe" class="btn btn-success">Clik Me</button>
    <button id="fadeInOut" class="btn btn-danger">Fade In/Out</button>
  </div>
  <div class="col"></div>
    </div>
    <h2 class="invisible">1</h2>
    <h2 class="invisible">2</h2>
    <div class="row">
      <div class="col"></div>
    <div class="col-10">
    <form id="formColor">
      <div class="for-group">
        <small class="form-text text-muted">Please enter a valid color name or code, don't forget the # symbol</small>
        <label for="colorInput">Name / Code:</label>
        <input type="text" id="colorInput" required>
      </div>
        <input type="submit" id="submitColor" class="btn btn-primary" value="Change color">
      
    </form>
  </div>
  <div class="col"></div>
  </div>
</main> 
<?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer-tp.php';?>
</body>
</html>