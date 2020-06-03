<?php
// Personal Project Controller
// Create or access a Session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
// Check if the Client is logged in and hold its first name into a variable
if (isset($_SESSION['loggedin'])) {
    $welcomeFirstname = $_SESSION['clientData']['clientFirstname'];
}

// Check if the firstname cookie exists, get its value
if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}


switch ($action) {
    case 'insertTM':
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $member_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $member_lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passConfirmation = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);

        $member_email = checkEmail($email);
        $member_password = checkPassword($password);

        if ($member_password !== $passConfirmation) {
            $message = "Passwords don't match. Please try again.";
            include '../view/sf-singup.php';
            exit;
        }

        if (empty($member_email) || empty($member_name) || empty($member_lastname) || empty($member_password) || empty($passConfirmation) ) {
            $message = "Please provide information for all empty form fields.";
            include '../view/sf-singup.php';
            exit;
        }

        $insertOutcome = insertCustomer($member_email, $member_name, $member_lastname, $member_password);
        // Check and report the result
        if ($insertOutcome === 1) {
            $message = "Customer <strong>" . $customer_name . "</strong> was successfully added.";
            include '../view/sf-customer-add.php';
            exit;
        } else {
            $message = "Sorry, the add the customer failed. Please try again.";
            include '../view/sf-customer-add.php';
            exit;
        }
        break;

    case 'register':
        include '../view/sf-singup.php';
        break;

    default:
        include '../view/sf-login.php';
        break;
}
