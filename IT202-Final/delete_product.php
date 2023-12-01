<?php

session_start();
require('logged_in_shoes.php');
//$refreshConfirmValue = 0;
//$_SESSION['$refreshConfirmValue'] = $refreshConfirmValue;

$shoe_code = filter_input(INPUT_POST,'delete_shoe_code'); // retrieves input value used to delete table entry

if ($shoe_code != false) {
    $query = 'DELETE FROM shoes 
              WHERE shoeCode = :shoe_code'; // statement that deletes shoeEntry via its shoeCode
    $statement = $db->prepare($query);
    $statement->bindValue(':shoe_code', $shoe_code);
    $success = $statement->execute();
    $statement->closeCursor();    
}
?>