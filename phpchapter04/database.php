<?php
    // Slide 26
    $local_dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $local_username = "mgs_user";
    $local_password = 'pa55word';

    $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=nam';
    $njit_username = 'nam';
    $njit_password = '5CP_61o-12';

    // TODO create variables for NJIT Server
    $dsn = $njit_dsn;
    $username = $njit_username;
    $password = $njit_password;

    try{
        $db = new PDO($dsn, $username, $password);
        echo '<p>You are connected to the local database!</p>';
    }catch(PDOException $exception){
        $error_message = $exception->getMessage();
        include("database_error.php");
        exit();
    }
?>