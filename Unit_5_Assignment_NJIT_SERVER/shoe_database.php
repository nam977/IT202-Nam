<?php
    // Slide 26
    $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=nam';
    $njit_username = 'nam';
    $njit_password = '5CP_61o-12';

    // TODO create variables for NJIT Serverls

    try{
        $db = new PDO($njit_dsn, $njit_username, $njit_password);
        echo '<p>You are connected to the local database!</p>';
    }catch(PDOException $exception){
        $error_message = $exception->getMessage();
        include("shoe_database_error.php");
        exit();
    }
?>