<?php
$cookie_name = "userid";

// set the expiration date to one hour ago
$one_hour_in_seconds = 60 * 60;

setcookie($cookie_name, "", time() - $one_hour_in_seconds, "/");

echo "Cookie named $cookie_name is deleted.";
?>
