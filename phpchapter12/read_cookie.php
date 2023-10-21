<?php
    $cookie_name = "userid";

    //RETRIEVE from $_COOKIE superglobal array
    $cookie_value = filter_input(INPUT_COOKIE, $cookie_name, FILTER_VALIDATE_INT);

    if(!isset($cookie_value)){
        echo "Cookie name $cookie_name is not set!";
    }else{
        echo "Cookie named $cookie_name is set!<br>";
        echo "Cookie value is $cookie_value";
    }
?>
