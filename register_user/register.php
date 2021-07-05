<?php
require('../model/database.php');
require('../model/user_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if($action == 'register_user')
{   
    $user_firstName = $_POST['firstName'];
    $user_lastName = $_POST['lastName'];
    $user_gender = $_POST['gender'];
    
    $user_email = $_POST['email'];

    $user_password = $_POST['password'];
    $user_confirmPassword = $_POST['confirmPassword'];

    // Validate the inputs
    if (empty($user_firstName) || empty($user_lastName) || empty($user_gender) 
            || empty($user_email) || empty($user_password) || empty($user_confirmPassword)) {
        $error = "All fields must be entered! Check all fields and try again.";
        include('../errors/error.php');
        exit();
    } 
    else {
        //check here if user with that email exists -> if not allow register -> if yes display error message
        check_user_exists($user_email);

        //Check if password and confirm password match
        if($user_password != $user_confirmPassword){
            $error = "Password and confirmed password must match! Check all fields and try again.";
            include('../errors/error.php');
            exit();
        }

        //Register user -> add query to db
        register_user($user_firstName,$user_lastName,$user_gender,$user_email,$user_password);
        include('register_success.php');
    }
}else if($action == 'login_user'){
    $user_login_email = $_POST['email'];
    $user_login_password = $_POST['password'];
    login_user($user_login_email,$user_login_password);
}else if($action == 'logout_user'){
    $sessionMail = filter_input(INPUT_COOKIE, 'userEmail', FILTER_VALIDATE_EMAIL);
    logout_user($sessionMail);
}


?>