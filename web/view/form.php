<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Form Demo</title>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/head-tp.php';?>
    </head>
    <body class="d-flex flex-column h-100">

        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/header-tp.php';?>
       
        <h6 class="invisible">1</h6>
       
        <main class="container-md">    
        <h1 class="display-4 text-center">Form Handling Demo</h1>
        <h6 class="invisible">1</h6>

          <!-- Form STARTS -->

        <form class="container-fluid" action="../teamprojects/index.php" method="post">

          <!-- Name section STARTS -->
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="username" aria-describedby="nameHelp">
                    <small id="namelHelp" class="form-text text-muted">e.g. Jhon Smith</small>
                </div>
              </div>
              <!-- Name section ENDS -->

              <!-- Email section STARTS -->
              <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email address</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            </div>

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Major</label>
                <div class="col-sm-10">
                <?php
                foreach ($majors as $key=>$major) {
                    print '<input type="radio" name="major" value="' . $key . '"> ' . $major . '<br>';
                }
                ?>
                  <small id="majorlHelp" class="form-text text-muted">Choose your major</small>
              </div>
            </div>
            <!-- Name section ENDS -->

           <!-- Choose your major radio buttons STARTS 
            
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Major</label>
                <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="major" id="major1" value="Computer Science">
                <label class="form-check-label" for="major1">
                    Computer Science
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="major" id="major2" value="Web Design and Development">
                <label class="form-check-label" for="major2">
                      Web Design and Development
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="major" id="major3" value="Computer Information Technology">
                <label class="form-check-label" for="major3">
                       Computer Information Technology 
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="major" id="major4" value="Computer Engineering">
                <label class="form-check-label" for="major4">
                      Computer Engineering
                </label>
            </div>
            <small id="majorlHelp" class="form-text text-muted">Choose your major</small>
            </div>
        </div>

        Choose your major radio buttons ENDS --> 

        <!-- Comments section STARTS -->
        <div class="form-group row">
            <label for="comments" class="col-sm-2 col-form-label">Comments</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
            <small id="commentslHelp" class="form-text text-muted">Tell us something special about you</small>
            </div>
          </div>
          <!-- Comments section ENDS -->

          <!-- Continents section STARTS -->
          <div class="form-group row">
            <label for="comments" class="col-sm-2 col-form-label">Continents you have visited</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="place[]" value="North America" id="North America">
                    <label class="form-check-label" for="North America">
                      North America
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="place[]" value="South America" id="South America">
                    <label class="form-check-label" for="South America">
                      South America
                    </label>
               </div>
               <div class="form-check">
                <input class="form-check-input" type="checkbox" name="place[]" value="Europe" id="Europe">
                <label class="form-check-label" for="Europe">
                  Europe
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="place[]" value="Asia" id="Asia">
                <label class="form-check-label" for="Asia">
                  Asia
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="place[]" value="Australia" id="Australia">
                <label class="form-check-label" for="Australia">
                  Australia
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="place[]" value="Africa" id="Africa">
                <label class="form-check-label" for="Africa">
                  Africa
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="place[]" value="Antartica" id="Antartica">
                <label class="form-check-label" for="Antartica">
                  Antartica
                </label>
              </div>
              <small id="placeslHelp" class="form-text text-muted">Check all the places you have been</small>       
              </div>
          </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="action" value="formPost">
            </div>
          </div>

          <!-- Comments section ENDS -->

          </form>

          <!-- Form ENDS -->

        </main>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer-tp.php';?>
    </body>
</html>