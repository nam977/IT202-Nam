<?php 
session_start();
require('admin_db.php');

//echo $_SESSION['is_valid_user'];

if($_SESSION['is_valid_user'] == 0){
    header("location:login.php");
}
/*
Retrieves SQL Database Column
*/
require_once("database.php");

$query = 'SELECT *
          FROM shoecategories
          ORDER BY shoeCategoryID';
$db = getDB();
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
        <?php include("logged_in_header.php"); ?>
    </div>
    <div class = "main-section">
        <h2 class = "user_info"> <?php echo getFullName(); ?> </h2>

        <h2>
            <p> You have Successfully Logged In!</p>            
        </h2>
        <br>
        <h2>
            <p>
                Welcome to our shoe Catalog. 
                Feel free to add any shoe of 
                your choosing and remember, 
                have fun!
            </p>

            <br>
        </h2>
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

            <form id = "mainForm" name = "mainForm" class = "form_input_box" action = "add_shoe.php" method = "post">            
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
                <input onclick = "Javascript:test()" class = "shoe_code_class_label" type = "submit" value = "Add Shoe"> <!-- submit_buttom -->

                <input id = "shoe_reset_button"class = "shoe_code_class_label" type = "submit" value = "Reset Form"> <!-- submit_buttom -->


                <script type = "text/javascript">
                    function test(){
                        var error_messages = "";
                        var shoeCodeValue = document.getElementById("shoe_code").value;
                        var shoeNameValue = document.getElementById("shoe_name").value;
                        var shoeNameDescription = document.getElementById("description_text_area").value;
                        var shoeNamePrice = document.getElementById("shoe_price").value;
                        var shoePriceValue = parseFloat(shoeNamePrice);
                        
                        if(shoeCodeValue == ""){
                            error_messages += "Invalid Input. \nShoe code cannot be empty\n";

                        }else if((shoeCodeValue.length > 1 && shoeCodeValue.length) < 4 || shoeCodeValue.length > 10){
                            error_messages += "Invalid Input. \nShoe code must be between 4 and 10 characters\n";
                        }

                        if(shoeNameValue == ""){
                            error_messages += "\nShoe name cannot be empty\n";
                        }else if(shoeNameValue.length < 10 || shoeNameValue.length > 100){
                            error_messages += "\nShoe name must be between 10 to 100 characters\n";
                        }

                        if(shoeNameDescription == ""){
                            error_messages += "\nShoe Description cannot be empty\n";
                        }else if(shoeNameDescription.length < 10 || shoeNameDescription.length > 255){
                            error_messages += "\nShoe Description must be a minimum of 10 characters & a maximum of 255 characters\n";
                        }

                        if(shoeNamePrice == ""){
                            error_messages += "\nShoe Price cannot be empty\n";
                        }else if(shoePriceValue <= 0){
                            error_messages += "\nShoe Price cannot be less or equal to $0\n";
                        }else if(shoePriceValue > 100000){
                            error_messages += "\nShoe Price cannot exceed $100000\n";

                        }

                        if(error_messages != ""){
                            window.alert(error_messages);
                            return false;
                        }
                        return true;
                    }

                    const resetFunction = evt => { // Event object
                        var resetForm = document.getElementById("mainForm")[0];
                        resetForm.reset();
                        return false;
                    };
                    
                    document.addEventListener("DOMContentLoaded", () => {
                        select("#shoe_reset_button").addEventListener("click", resetFunction);
                    });     
                </script>
            </form>
        </div>
    </div>     
    <div>
        <?php include("footer.php"); ?>
    </div>
    </main>
    </body>
</html>