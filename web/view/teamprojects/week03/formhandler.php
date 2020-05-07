<?php
//Person's name:
$name = htmlspecialchars($_POST["username"]);

//Person's email
$email = htmlspecialchars($_POST["email"]);

//Person's major
if (isset($_POST["major"])) {
    $majorSelection = "";
    switch ($_POST["major"]) {
        case "cs": 
            $majorSelection = "Computer Science";
            break;
        case "wdd": 
            $majorSelection = "Web Design and Development";
            break;  
        case "cit": 
            $majorSelection = "Computer Information Technology";
            break;
        case "cs":
            $majorSelection = "Computer Engineering";
            break;
        default:
            break;
    }
}

//Person's comments
$comments = htmlspecialchars($_POST["comments"]);

//Output places message;
$placesMessage = "";

//Check if the place option is empty or not
if(empty($_POST["place"])) {
    // if it is empty provide a message
    $placesMessage = "You haven't been on earth recently.";
} else {
    //If it is not empty store the value on a variable
    $places = $_POST["place"];
    //Getting the amount of options selected
    $n = count($places);
    //Printing every place with a for loop
    for($i=0; $i < $n; $i++ ) {
        //Store the value of every place on a variable and concatenate it on each iteration
        $placesMessage .= $places[$i] . ". ";
    }
}
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Form Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Teach Activity Week03 by Francisco"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body class="container-fluid">
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
        <script src="jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>