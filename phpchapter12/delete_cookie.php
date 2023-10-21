<?php
    // set the expiration date to one hour ago
    $cookie_name = "userid";
    $one_hour_in_seconds = 60 ** 2;

    setcookie("userid", "", time() - $one_hour_in_seconds, "/");

    echo "Cookie named $cookie_name is deleted.";
?>

