<?php
require_once('database.php');

print_r($_POST);

$product_id = filter_input(INPUT_POST, 'product_id', 
                           FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id',
                            FILTER_VALIDATE_INT);

// Delete the product from the database
if($product_id != FALSE || $category_id != FALSE){
    $query = 'DELETE FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $success = $statement->execute();
    $statement->closeCursor();
}

// Display the product page list
include('index.php');
?>