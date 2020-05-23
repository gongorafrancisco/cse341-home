<?php
//Assignments Controller

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
default:
 include '../view/assignments.php';
    break;
}
?>