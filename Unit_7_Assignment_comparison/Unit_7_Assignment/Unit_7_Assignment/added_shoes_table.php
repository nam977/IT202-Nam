<?php
require_once('shoe_database.php');
$query = 'SELECT *
          FROM shoecategories
          ORDER BY shoeCategoryID';

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
                <label class = "shoe_code_class_label"> Shoe Code: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_code" name = "shoe_code"> <br> 
            

                <label class = "shoe_code_class_label"> Shoe Name: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_name" name = "shoe_name"> <br> 
                
                <label class = "shoe_code_class_label"> Shoe ID: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_id" name = "shoe_id"> <br> 

                <label class = "shoe_code_class_label"> Brief Description: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "description_text_area" name = "description_text_area">
                
                <br>

                <label class = "shoe_code_class_label"> Shoe Category: </label> 

                <select name = "shoe_category" class = "shoe_code_class_label">
                    <?php foreach ($categories as $category) : ?>
                        <option value = "<?php
                                            echo $category['shoeCategoryID'];
                                         ?>">

                                         <?php echo $category['shoeCategoryName']; ?>             
                        </option>
                    <?php endforeach;?>
                </select> <br>

                <br>
                <label class = "shoe_code_class_label"> Shoe Price: </label> 
                <input class = "shoe_code_class_label" type = "text" id = "shoe_price" name = "shoe_price">
                
                <br>

                <label> &nbsp; </label>
                <input class = "shoe_code_class_label" type = "submit" value = "Add Shoe"> 
            </form>
        </div>
    </div>
        <?php include("footer.php"); ?>
    </div>
    </main>
    </body>
</html>