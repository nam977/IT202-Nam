<?php 

/*
Retrieves SQL Database Column
*/
require_once('database.php');
$query = 'SELECT *
          FROM shoecategories
          ORDER BY shoeCategoryID';

$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

$gen_id = rand(0, getrandmax());
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

            <br>
        </h1>
        <!--
            Main User Input Section
        -->
        <div class = "shoe_form_input_main">

            <div class = "final_images1">
                <img src = "images/final_shoe_1.jpg" width = "200px" height = "200px"/>    
                <img src = "images/final_shoe_2.jpeg" width = "200px" height = "200px"/>
                <img src = "images/final_shoe_3.jpg" width = "200px" height = "200px"/>
                <br>
                <img src = "images/final_shoe_4.jpg" width = "200px" height = "200px"/>
                <img src = "images/final_shoe_5.jpg" width = "200px" height = "200px"/>
                <img src = "images/final_shoe_6.jpg" width = "200px" height = "200px"/>
                <br>
                <img src = "images/final_shoe_7.jpg" width = "200px" height = "200px"/>
                <img src = "images/final_shoe_8.jpg" width = "200px" height = "200px"/>
                <img src = "images/final_shoe_9.jpg" width = "200px" height = "200px"/>                
            </div>

            <h1> Shoe Category Selection Menu: </h1>

            <form class = "form_input_box" action = "add_shoe.php" method = "post">            
                <label class = "shoe_code_class_label"> Shoe Code: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_code" name = "shoe_code"> <br> 
            

                <label class = "shoe_code_class_label"> Shoe Name: </label> <br>
                <input class = "shoe_code_class_label" type = "text" id = "shoe_name" name = "shoe_name"> <br> 
                
                
                <input class = "shoe_code_class_label" id = "shoe_id" name = "shoe_id" value = '<?php echo $gen_id; ?>' hidden> <!-- Generates user ID -->
                <br>
                

                <label class = "shoe_code_class_label"> Brief Description: </label> <br>
                <textarea class = "shoe_code_class_label" type = "text" id = "description_text_area" name = "description_text_area"> </textarea>
                
                <br>

                <label class = "shoe_code_class_label"> Shoe Category: </label> 

                <!--
                    Displays SQL Column Data
                -->
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
                <input class = "shoe_code_class_label" type = "submit" value = "Add Shoe"> <!-- submit_buttom -->
            </form>
        </div>
    </div>     
    
    <div>
        <?php include("footer.php"); ?>
    </div>
    </main>
    </body>
</html>