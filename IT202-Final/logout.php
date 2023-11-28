<?php
session_unset(); // unsets session
$_SESSION = []; // Clears all session data
$login_message = 'You have been logged out.';
include('login.php');
?>