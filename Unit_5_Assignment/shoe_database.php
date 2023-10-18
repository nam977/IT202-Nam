<?php
$local_dstn = 'mysql:host=sql1.njit.edu;port=3306;dbname=nam';
$local_username = 'nam';
$local_pass = '5CP_61o-12';

try{
    $db = new PDO($local_dstn, $local_username, $local_pass);
    echo "<p> You are connected to the shoe store database </p>";
}catch(PDOException $e){
    $error_message = $e->getMessage();
    include('shoe_database_error.php');
    exit();
}
?>