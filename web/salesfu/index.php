<?php
// Personal Project Controller

//Create or access a session
session_start();

//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the herokuConnect function out of the connections.php file
require_once '../model/sf-accounts-model.php';

//Get the functions from sf-functions.php file
require_once '../library/sf-functions.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {
    case 'logout' :
        unset($_SESSION['member_name']);
        header('Location: /salesfu');
        die();
        break;

    case 'insertTM':
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $member_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $member_lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passConfirmation = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);

        $validPassword = checkPassword($password);
        if ($validPassword == 0) {
            $message = "Passwords must be at least 7 characters and contain at least 1 number, 1 capital letter and 1 special character. Please try again.";
            include '../view/sf-singup.php';
            exit;
        }

        if ($password !== $passConfirmation) {
            $message = "Passwords don't match. Please try again.";
            include '../view/sf-singup.php';
            exit;
        }

        $member_email = checkEmail($email);
        
        if (empty($member_email) || empty($member_name) || empty($member_lastname) || empty($password)) {
            $message = "Something went wrong, you either:
            <ul class='text-muted'>
                <li><small>Enter an <strong>empty value</strong></small></li>
                <li><small>The email is not a <strong>valid email</strong></small></li>
            </ul>
            Please try again.";
            include '../view/sf-singup.php';
            exit;
        }

        $member_password = password_hash($password, PASSWORD_DEFAULT);
        $insertOutcome = insertTeamMember($member_email, $member_name, $member_lastname, $member_password);
        
        if ($insertOutcome === 1) {
            $_SESSION['message'] = "Thanks for registering <strong>". $member_name. "</strong>. You can now use your email and password to login.";
            $_SESSION['member_name'] = $member_name;
            header('Location: /salesfu');
            die();
        } else {
            $message = "Sorry, registration failed. Please try again.";
            include '../view/sf-singup.php';
            exit;
        }
        break;
    
    case 'login':
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if (empty($email) || empty($password)) {
            $message = "Please fill all required fields.";
            include '../view/sf-login.php';
            exit;
        }

        $memberInfo = getMemberByEmail($email);
        $hashCheck = password_verify($password, $memberInfo['member_password']);
        
        if($hashCheck) {
            array_pop($memberInfo);
            $_SESSION['member_name'] = $memberInfo['member_name'];
            include '../view/sf-dashboard.php';
            exit;
        } else {
            $message = "Please check your email and password and try again";
            include '../view/sf-login.php';
            exit;
        }
        break;
    
    case 'register':
        include '../view/sf-singup.php';
        break;
    
    case 'dashboard':
        include '../view/sf-dashboard.php';
        break;
        
    default:
        $_SESSION['message'] = "Message is working";
        include '../view/sf-login.php';
        break;
}
