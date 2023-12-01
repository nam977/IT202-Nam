<?php  
    session_start();
    //echo $_SESSION['is_valid_user'];
    require('admin_db.php');


    if($_SESSION['is_valid_user'] == 0){
        header("location:login.php");
    }
    /*
        Author: Lewis M
        UCID: nam
        Course Name: IT-202-001
        Assignment: Unit 3 Assignment
        Email: nam@njit.edu
    */
    $error_message = '';
    $proceed_value = 0;

    /*
    Box dimensions input values. 
    Defaults values are 10 by 5 by 15. 
    Input Values validate a POST supervariable for valid or invalid int data

    */
    $box_dimension_height = filter_input(INPUT_POST, 'box_dimension_height', FILTER_VALIDATE_INT) ?? 10; 
    $box_dimension_width = filter_input(INPUT_POST, 'box_dimension_width', FILTER_VALIDATE_INT) ?? 5;
    $box_dimension_length = filter_input(INPUT_POST, 'box_dimension_length', FILTER_VALIDATE_INT) ?? 15;
    $shipping_date = $_POST['shipping_date'] ?? '10/6/2045'; // Retrieves shipping data. Default value is 10/6/2045
    $order_number_input = $_POST['order_number'] ?? 10;
        
    $zip_code_input = filter_input(INPUT_POST, 'zip_code', FILTER_VALIDATE_INT) ?? '05768'; // Zip Code value. Default is zip code: 05768
    $zip_code_input_str = (string)$zip_code_input;
    

    /*
    Name values.
    Default name is: John Doe
    */
    $first_name_input = $_POST['first_name'] ?? 'John'; 
    $last_name_input = $_POST['last_name'] ?? 'Doe';

    
    //Address & City values.
    
    $street_address_input = $_POST['street_address'] ?? '129 Kearny Road'; // default address
    $city_input = $_POST['city'] ?? 'Denver'; // default city

    $shpping_date_f = $_POST['shipping_date'] ?? '10/6/2045';

    $state_input = $_POST['state'] ?? 'CO'; // Default state

    $price_input = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT) ?? 45; 

    $datemin_input = $_POST['shipping_date'] ?? '10/6/2023'; // Contains minimum date allowed

    // Validates $state_input value
    if($state_input == ''){
        $error_message .= 'Invalid Input, State  cannot be empty.<br>';
        $state_input = "CO";
    }else if(strlen($state_input) != 2){
        $error_message .= 'Invaid Input, State must consist of Two Letters Only.<br>'; // checks if $state_input consists of only 2 letters
        $state_input = "CO";
    }else if(ctype_alpha($state_input) === False){
        $error_message .= 'Invalid Input, State must consist of Letters Only.<br>'; // checks if $state_input consists of only letters
        $state_input = "CO";
    }

    // validates an order Number
    if(!is_int($order_number_input)){
        $error_message .= 'Invalid Input, Order Number must be a number.<br>';
        $order_number_input = 10;
    }else if($order_number_input < 0){ // checks if $error_message is less than 0
        $error_message .= "Invalid Input, Order number cannot be less than 0<br>"; 
        $order_number_input = 10;
    }

    // validates $zip_code_input    
    if($zip_code_input === ''){
        $error_message .= 'Invalid Input, Zip Code Cannot be empty.<br>';
        $zip_code_input = '05768';
    }
    else if(strlen($zip_code_input_str) != 5){
        $error_message .= 'Invalid Input, Zip Code Must have 5 Digits.<br>'; // checks if zip code has a length of 5
        $zip_code_input = '05768';
    }

    // Validates $price_input
    if($price_input === False){
        $error_message .= 'Invalid Input, Price must be a valid number.<br>';
        $price_input = 45;
    }else if($price_input <= 0){ // checks if $price_input is less than or equal to 0
        $error_message .= 'Invalid Input, Price cannot be less than or equal to zero.<br>';
        $price_input = 45;
    }else if($price_input > 150){ // prevents $price_input from exceeding $150
        $error_message .= 'Invalid Input, Price cannot exceed $150.<br>';
        $price_input = 45;
    }

    // appends an error message if $city_input is empty
    if($city_input == ''){
        $error_message .= 'Invalid Input, City Cannot be Blank.<br>';
        $city_input = 'Denver';
    }
    
    // appends an error message if $street_address_input is empty

    if($street_address_input == ''){
        $error_message .= 'Invalid Input, Street Address Cannot be Blank.<br>';
        $street_address_input = '129 Kearny Road';
    }

    /*
    Box Dimensions check validaters. 
    All three if, else if and else statements below 
    validate with box dimensions is empty, and also
    validate whether they exceed 36 inches or is less than 3 inches
    */
    if($box_dimension_height === FALSE){
        $error_message .= 'Invalid Input, Box Height must be a valid Number.<br>';
        $box_dimension_height = 10;
    }else if($box_dimension_height > 36){
        $error_message .= 'Invalid input, Box Height cannot exceed 36 Inches.<br>';
        $box_dimension_height = 10;
    }else if($box_dimension_height < 3){
        $error_message .= 'Invalid input, Box Height cannot be less than 3 Inches.<br>';
        $box_dimension_height = 10;
    }

    if($box_dimension_width === FALSE){
        $error_message .= 'Invalid Input, Box Width must be a valid Number.<br>';
        $box_dimension_width = 5;
    }else if($box_dimension_width > 36){
        $error_message .= 'Invalid input, Box Width cannot exceed 36 Inches.<br>';
        $box_dimension_width = 5;
    }else if($box_dimension_width < 3){
        $error_message .= 'Invalid input, Box Width cannot be less than 3 Inches.<br>';
        $box_dimension_width = 5;
    }

    if($box_dimension_length === FALSE){
        $error_message .= 'Invalid Input, Box Length must be a valid Number.<br>';
        $box_dimension_length = 15;
    }else if($box_dimension_length > 36){
        $error_message .= 'Invalid input, Box Length cannot exceed 36 Inches.<br>';
        $box_dimension_length = 15;
    }else if($box_dimension_length < 3){
        $error_message .= 'Invalid input, Box Length cannot be less than 3 Inches.<br>';
        $box_dimension_length = 15;
    }

    if($first_name_input == ''){
        $error_message .= 'Invalid Input, First Name Cannot be Blank.<br>';
        $first_name_input = 'John';
    }

    if($last_name_input == ''){
        $error_message .= 'Invalid Input, Last Name Cannot be Blank.<br>';
        $last_name_input = 'Doe';
    }

    $box_dimensions_f = 'Box Dimensions: ' . $box_dimension_length . " in. x " . $box_dimension_width . " in. x " . $box_dimension_height . ' in.';
    $name_f = 'Ship to: ' . $first_name_input . ' ' . $last_name_input;
    $shipping_address_f = $street_address_input . "<br>&emsp;" . $city_input . ", " . $state_input . " " . $zip_code_input_str;
    $from_address_f = '100 W Century Road<br>&emsp;Paramus, NJ 07652';
    $price_f = 'Declared Price: $' . $price_input;
    $shipping_company_f = 'From: FedEx'; // Shipping Company Variable
    $shipping_date_f = 'Shipping Date: ' . $shipping_date;    
    $order_number_f = 'Order Number: ' . $order_number_input;
    $tracking_number = 'Tracking #: DS-9341'; // Fake tracking number
    $shipping_class = "Shipping Class: Priority Mail";

    if($error_message != ""){
        $error_message .= "\nUsing Default options due to multiple Input Errors";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        
        <title> Shoe Store Shipping Info </title>
        <link rel = "stylesheet" href = "main.css">
    </head>
    <style>
        
        .main-info{
            font-size: 23px;
            text-align: center;
            padding: 50px;
            position: relative;
        }

        .error_message{
            font-color: red;
        }

        html{
            padding-bottom: 100px;
        }

        #qrcode{
            position: relative;
            align: center;
            bottom: -30px;
            max-width: 100%;
            height: auto;
        }

        .Bottom-Info{
            border-style: solid;
        }

        .barcode-info{
            border-style: solid;
            padding: 10px;
        }

        .sender-reciever-info{
            padding: 30px;
            border-style: solid;
            text-align: left;
        }

        .shipping-info{
            border-style: solid;
            font-style: bold;
        }

        .top-info{
            border-style: solid;
            text-align: left;
            padding: 30px;
        }
z
        .user_info{
            margin-left: 5%;
        }
    </style>
    <body>
        <main>
                
                <div class = "header">
                    <?php include('logged_in_header.php'); ?>
                </div>
                <div class = "error_message">
                    <?php 
                        if($error_message != ''){
                            echo htmlspecialchars_decode($error_message); 
                            // Displays error message if invalid data is submitted in the input form
                        }
                    ?>
                </div>
                
                <div class = "main-info">
                    <h1 class = "user_info"> <?php echo getFullName(); ?> </h1>
                    <h1> My Shoe Store Customer Shipping Info: </h1>

                    <div class = "top-info">
                        <span> <?php echo $order_number_f;?> </span> <br>
                        <span> <?php echo $price_f;?> </span> <br>
                        <span> <?php echo $box_dimensions_f;?> </span> <br>
                        <span> <?php echo $shipping_date_f;?> </span> <br>
                    </div>
                    <div class = "shipping-info">                        
                        <h1><span> <?php echo $shipping_class;?> </h1></span> <br>
                    </div>

                    <div class = "sender-reciever-info">
                        <span class = "s_r_text"> <?php echo $shipping_company_f;?> </span> <br>
                        <span class = "s_r_text"> &emsp; <?php echo htmlspecialchars_decode($from_address_f);?> </span> <br>
                        <br> <br>
                        <span class = "s_r_text"> <?php echo $name_f;?> </span> <br>
                        <span class = "s_r_text"> &emsp; <?php echo htmlspecialchars_decode($shipping_address_f);?> </span> <br>
                    </div>

                    <div class = "barcode-info">
                        <span> <img id = "qrcode" src = "images/barcode.png" width = "700px" height = "65px"> </span> <br>
                        <span> <p> 12345 01234 51234 51234 </p> </span> <!-- Fake track Routing number -->
                    </div>

                    <div class = "Bottom-Info">
                        <span> <?php echo $tracking_number; ?> </span> <br>
                    </div>
                </div>
                
            </div>
            
            <div class = "footer">
                <?php include('footer.php'); ?>
            </div>
        </main>
    </body>
</html>
