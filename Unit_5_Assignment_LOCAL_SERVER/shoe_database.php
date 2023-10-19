<?php
    // Slide 26
    $local_dsn = 'mysql:host=localhost;dbname=shoe_store_db_1';
    $local_username = "mgs_user";
    $local_password = 'pa55word';

    try{
        $db = new PDO($local_dsn, $local_username, $local_password);
        echo '<p>You are connected to the local database!</p>';
    }catch(PDOException $exception){
        $error_message = $exception->getMessage();
        include("shoe_database_error.php");
        exit();
    }
?>