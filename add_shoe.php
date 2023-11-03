<?php
// Retrieves shoe data
$shoe_id = filter_input(INPUT_POST, 'shoe_id', FILTER_VALIDATE_INT);
$shoe_category = filter_input(INPUT_POST, 'shoe_category', FILTER_VALIDATE_INT);
$shoe_code = filter_input(INPUT_POST, 'shoe_code');
$shoe_name = filter_input(INPUT_POST, 'shoe_name');
$description_text_area = filter_input(INPUT_POST, 'description_text_area');

$shoe_price = filter_input(INPUT_POST, 'shoe_price', FILTER_VALIDATE_FLOAT);

if($shoe_code == null || $shoe_name == null || $shoe_description == false
                      || $shoe_category == null || $shoe_code == false 
                      || $shoe_price == null || $shoe_price == false){
    $error_message = "Invalid Input. Please check all user entered form input & resubmit.";
    include('error.php');
}else{
    require_once('shoe_database.php');
}

// Add the product to the database
$shoe_query = 'INSERT INTO shoes
(shoeID, shoeCategoryID, shoeCode, shoeName, description, price, dateAdded)
VALUES
(:shoe_id, :shoe_category, :shoe_code, :shoe_name, :description_text_area, :shoe_price, NOW())';


$statement = $db->prepare($shoe_query);
$statement->bindValue(':shoe_id', $shoe_id);
$statement->bindValue(':shoe_category', $shoe_category);
$statement->bindValue(':shoe_code', $shoe_code);
$statement->bindValue(':shoe_name', $shoe_name);
$statement->bindValue(':description_text_area', $description_text_area);
$statement->bindValue(':shoe_price', $shoe_price);
$statement->execute();
$statement->closeCursor();
include('shoes.php');

?>