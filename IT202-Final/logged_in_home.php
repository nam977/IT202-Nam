

<?php
    session_start();
    require('admin_db.php');


    if($_SESSION['is_valid_user'] == 0){
        header("location:login.php"); // if $_session value of is_valid_user is 0, it redirects back to login page.
        // This prevents unauthorized users from accessing logged-in only users pages
    }
    /*
    if(!isset($_SESSION["is_valid_user"])){
        header("location:login.php");
    }*/
    /*
    Author: Lewis M
    UCID: nam
    Course Name: IT-202-001
    Assignment: Unit 3 Assignment
    Email: nam@njit.edu
    */  
    date_default_timezone_set('UTC'); // sets the default time zone to universal
    $current_date = date('m-d-Y'); // retrieves the current date
?>

<!DOCTYPE html>

<html>
    <head>
        <style>
            .user_info{
                margin-left: 35%;
            }
        </style>
        <title> My Shoe Store </title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <body>
        <main>

        <!-- Establishes website header & navigation menu -->
        <div class = "header">
            <?php include('logged_in_header.php'); ?>
        </div>
        <div class = "main_div">
            <h1 class = "user_info"> <?php echo getFullName(); ?> </h1> 
            <p class = "main-greeting-header"> My Shoe Store Welcomes You!  </p> 

            <div class = "introduction1 left">
            <!-- Company origin section -->
            <div class = "paragraph1">
                <h2> Founding </h2>
                <p>
                    Founded in 1973, My Shoe Store is a family owned online retail 
                    business specializing <br>in all things shoe related. 
                </p>
            
                <figure>
                    <img src = "images\shoe1.jpg" alt = "shoe1" width = "250px" height = "138px"> 
                    <img src = "images\shoe3.jpg" alt = "shoe3" width = "250px" height = "138px">
                    <figcaption> Awesome red & white sneakers </figcaption>
                </figure>
            </div>

            <!-- Company Mission Statement Section -->
            <div class = "paragraph2">
                <h2> Mission Statement </h2>
                <p>
                    Our mission is to provide the best & most comfortable shoes for a
                    modestly low price. <br> Whether it is Uggs for the winter, or socks &
                    sandles for the summer, My Shoe Store has <br>the most up-to-date
                    seasonal foot wear on the market for all your foot wearing needs. 
                </p>
                
                <figure>
                    <img src = "images\uggs1.jpg" alt = "uggs1" width = "250px" height = "138px">
                    <img src = "images\socks&sandles1.jpg" alt = "socks & sandles" width = "250px" height = "138px">
                    <figcaption> Fabulous Winter Uggs with Summer Dad Bod Socks & Sandles </figcaption>
                </figure>
            </div>

            <!-- Product Supply Chain Section -->
            <div class = "paragraph3">
                <h2> 100% American made! </h2>
                <p> 
                    Our shoes are artistically designed by the best shoe makers in the 
                    Normandy region of france. <br> At My Shoe Store, our shoes are 100%
                    American made. We never rely on outsourced products <br> from countries 
                    such as Vietnam, China, and Cambodia.
                </p>`

                <figure>
                    <img src = "images\shoe2.jpg" alt = "shoe2" width = "250px" height = "138px">
                    <img src = "images\shoe4.jpg" alt = "shoe2" width = "250px" height = "138px">
                    <figcaption> Groovy Variative footwear for teens & older </figcaption>
                </figure>
            </div>
            </div>

            <!-- Submission Section -->
            <div class = "submission_form right">
                <h1 class = form_input_box> Order Online Now </h1>
                <h2 class = form_input_box> Enter Shipping & Personal Info Below: </h2>

                <form class = "form_input_box" action = "formatted_input.php" method = "post"> <!-- configures submission form as a post global variable -->
                    
                    <label for = "fname"> First Name: </label> 
                    <input type = "text" id = "fname" name = "first_name" value = "lewis"> <br> <!-- Default value is John-->
                    <br>
                    
                    <label for = "lname"> Last Name: </label>  
                    <input type = "text" id = "lname" name = "last_name"> <br> <!-- Default Value is Doe -->
                    <br>
                    
                    <label for = "address"> Street Address: </label> 
                    <input type = "text" id = "address" name = "street_address"> <br>
                    <br>
                    
                    <label for = "city"> City: </label> 
                    <input type = "text" id = "city" name = "city"> <br>
                    <br>
                    
                    <label for = "state"> State: </label> 
                    <input type = "text" id = "state" name = "state"> <br>
                    <br>
                    
                    <label for = "zip"> Five Digit Zip Code: </label> 
                    <input id = "zip" type = "text" name = "zip_code"> <br>
                    <br>

                    <!-- Enables minimum Shipping Date -->
                    <label for = "datemin"> Enter a Shipping Date after <?php echo $current_date; ?>: </label> 
                    <input type = "date" id = "date" name = "shipping_date" min = "<?php echo $current_date; ?>" > <br> 
                    <br>

                    <!-- Box Width Input Fields Start -->
                    <label for = "box_dimension_width"> Enter a box width no greater than 36": </label>
                    <input type = "text" id = "box_dimension_width" name = "box_dimension_width"> <br>
                    <br>

                    <label for = "box_dimension_length"> Enter a box length no greater than 36": </label>
                    <input type = "text" id = "box_dimension_length" name = "box_dimension_length"> <br>
                    <br>

                    <label for = "box_dimension_height"> Enter a box height no greater than 36": </label>
                    <input type = "text" id = "box_dimension_height" name = "box_dimension_height"> <br>
                    <br>
                    <!-- Box Width Input Fields End -->

                    <label for = "price"> Enter a shoe price no greater than $150: </label>
                    <input type = "text" id = "price" name = "price"> <br>
                    <br>

                    <label for = "order_number"> Enter an order number: </label>
                    <input type = "text" id = "order_number" name = "order_number"> <br>
                    <br>

                    <div id = "buttons">
                        <label> &nbsp; </label>
                        <input type = "submit" value = "submit">
                    </div>
                    <div>
                        <!-- Validates all inputted data -->
                        <?php if(!empty($error_message)) {?>

                            <p>
                                <?php 
                                    if($error_message != ''){
                                        include('formatted_input.php');
                                        exit();
                                    }
                                ?>
                            </p>
                        <?php } ?>
    
                    </div>
                </form>
            </div>

            
        </div>
        <div class = "footer">
            <?php include('footer.php'); ?> <!-- Footer Section Script -->
        </div>
        </main>
    </body>
</html>