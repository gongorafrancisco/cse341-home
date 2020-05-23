<?php
//Team Projects Controller

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the queries from the scriptures-model.php file
require_once '../model/scriptures-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'week02':
        include '../view/w02-teach.php';
        break;
    case 'week03':
        $majors = array(
            "cs" => "Computer Science",
            "wdd" => "Web Design and Development",
            "cit" => "Computer information Technology",
            "ce" => "Computer Engineering"
        );

        include '../view/form.php';
        break;
    
    case 'formPost':
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
        if (empty($_POST["place"])) {
            // if it is empty provide a message
            $placesMessage = "You haven't been on earth recently.";
        } else {
            //If it is not empty store the value on a variable
            $places = $_POST["place"];
            //Getting the amount of options selected
            $n = count($places);
            //Printing every place with a for loop
            for ($i = 0; $i < $n; $i++) {
                //Store the value of every place on a variable and concatenate it on each iteration
                $placesMessage .= $places[$i] . ". ";
            }
        }
        include '../view/formhandler.php';
        break;

    case 'week05':
        $scriptures = getScriptures();
        if (count($scriptures) > 0) {
            $scripturesList = "<ul class='list-group'>";
            foreach ($scriptures as $scripture) {
                $scripturesList .= "<li class='list-group-item'><span class='font-weight-bold'>" . $scripture['scripture_book'] . " " . $scripture['scripture_chapter'] . ":" . $scripture['scripture_verse'] . " - " . "</span>" . $scripture['scripture_content'] . "</li>";
            }
            $scripturesList .= "</ul>";
        } else {
            $message = '<p class="notify">Sorry, no scriptures were returned.</p>';
        }
        include '../view/scriptures-resources.php';
        break;

    default:
        break;
}
?>