<?php 
require_once('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';

$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>

<html>
<head>
    <title> My Guitar Shop </title>
    <link rel = "stylesheet" href = "main.css">
</head>


</html>