<?php
/*
require_once('shoe_database.php');

// Retrieves shoeCategoryID
$shoe_category_id = filter_input(INPUT_GET, 'shoe_category_id', FILTER_VALIDATE_INT);

// Get shoe name from selected category
$shoe_query = 'SELECT * FROM shoecategories 
               WHERE shoeCategoryID = :shoe_category_id';
$statement1 = $db->prepare($shoe_query);
$statement1->bindValue(':shoe_category_id', $shoe_category_id);
$statement1->execute();
$category = $statement1->fetchAll();
$category_name = $category['shoeCategoryName'];
$statement1->closeCursor();


// Get all categories
$shoeQueryAllCategories = 'SELECT * FROM shoecategories
                           ORDER BY shoeCategoryID';
$statement2 = $db->prepare($shoeQueryAllCategories);
$statement2->execute();
$shoe_categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get shoe products for selected category
$queryShoeProducts = 'SELECT * FROM shoes WHERE shoeCategoryID = :shoe_category_id';
$statement3 = $db->prepare($queryShoeProducts);
$statement3->bindValue(':shoe_category_id', $shoe_category_id);
$statement3->execute();
$shoeProducts = $statement3->fetchAll();
$statement3->closeCursor();
*/
require_once('shoe_database.php');
$query = 'SELECT *
          FROM shoecategories
          ORDER BY shoeCategoryName';

$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>

<html>
<head>
    <title> My Shoe Store </title>
    <link rel = "stylesheet" href = "custom_table_main.css">
</head>

<body>
    <main>
        
    <div class = "header">
        <?php include("header.php"); ?>
    </div>
    <div class = "main-section">
        <h1>
            <p>
                Welcome to our shoe Catalog. 
                Feel free to add any shoe of 
                your choosing and remember, 
                have fun!
            </p>
        </h1>
        
        <div class = "shoe_form_input_main">

            <h1> Shoe Category Selection Menu: </h1>

            <form class = "form_input_box" action = "add_shoe.php" method = "post">            
                <label class = "shoe_code_class_label" for = "shoe_code"> Shoe Code: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_code" name = "shoe_code"> <br> 
            

                <label class = "shoe_code_class_label" for = "shoe_name"> Shoe Name: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_name" name = "shoe_name"> <br> 
                

                <label class = "shoe_code_class_label" for = "shoe_description"> Brief Description: </label> <br>
                <textarea class = "shoe_code_class_label" id = "description_text_area" name = "description_text_area" rows = "5" cols = "35">
                </textarea> 
                
                <br>
                
                <label class = "shoe_code_class_label" for = "shoe_category"> Shoe Category: </label> 

                <select name = "shoe_category" class = "shoe_code_class_label">
                <?php foreach ($categories as $category) : ?>
                    <option value = "<?php
                                        echo $category['shoeCategoryID'];
                                    ?>">

                                    <?php echo $category['shoeCategoryName']; 
                                    ?>
                                
                    </option>
                <?php endforeach;?>

                <br>
                <label class = "shoe_code_class_label" for = "shoe_price"> Shoe Price: </label> 
                <input class = "shoe_code_class_label" type = "text" id = "shoe_price" name = "shoe_price">
                
                <label> &nbsp; </label>
                <input class = "shoe_code_class_label" type = "submit" value = "Submit"> 
            </form>
        </div>
    </div>
        <?php include("footer.php"); ?>
    </div>
    </main>
    </body>
</html>