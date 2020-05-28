<?php
//Team Projects Controller

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the queries from the scriptures-model.php file
require_once '../model/scriptures-model.php';

//Get the functions.php file
require_once '../library/functions.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'insertScripture':
        $scripture_book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
        $scripture_chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_NUMBER_INT);
        $scripture_verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_NUMBER_INT);
        $scripture_content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        
        // Check for missing data
        if(empty($scripture_book) || empty($scripture_chapter) || empty($scripture_verse) || empty($scripture_content)){
        $message = '<p class="text-danger">All fields need to be fulfilled.</p>';
        $topics = getTopics();
        $topicsList = topicBuilder($topics);
        include '../view/add-scripture.php';
        exit; 
        }
        
        // Send the data to the model
        $rowOutcome = addScripture($scripture_book, $scripture_chapter, $scripture_verse, $scripture_content);

        // Check if the topics checkboxes are empty
        if(empty($_POST['scriptureTopic'])){
            header("Location:/teamprojects/index.php?action=week05");
            exit;
        } else {
            $scripture_topics = filter_input(INPUT_POST, 'scriptureTopic', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
            foreach ($scripture_topics as $topic){
                addScriptureLinks($topic, $rowOutcome);
            }
            header("Location:/teamprojects/index.php?action=week05");
            exit;
        }
    break;

    case 'addScripture' :
        $topics = getTopics();
        $topicsList = topicBuilder($topics);
        include '../view/add-scripture.php';
    break;

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
        $scripturesList = scriptureBuilder($scriptures);
        include '../view/scriptures-resources.php';
        break;

    default:
        break;
}
