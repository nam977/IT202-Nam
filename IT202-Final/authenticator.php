<?php
session_start(); /* initial session start */
require('admin_db.php'); /* retrieves login verifier */
// Slide 22
$email = filter_input(INPUT_POST, 'email'); /* retrieves email from login form */
$password = filter_input(INPUT_POST, 'password'); /* retrieves password from login form */


if(is_valid_login($email, $password)){ // validates of login matches
    $_SESSION["is_valid_user"] = 1; // sets valid user value to 1 in session
    $_SESSION["email"] = $email; // sets user email to email name in session

    header('location: added_shoes_table.php'); // redirects to logged in page added_shoes_table.php
}else{
    if($email == NULL && $password == NULL){ // checks if email or password form is empty
        $login_message = 'Login Error: You must login to view this page.';
    }else{
        $login_message = 'Login Error: Invalid credentials.'; // message that states that credentials are invalid
    }
    header('location:login.php'); // re-directs back to login page.
    echo $login_message;

}

?>

