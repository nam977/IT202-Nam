<?php
// clear all session data
$_SESSION = [];
session_destroy();
$login_message = 'You have been logged out.';
include('login.php');
?>
