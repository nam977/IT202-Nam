<?php
    /*
    Author: Lewis M
    UCID: nam
    Course Name: IT-202-001
    Assignment: Unit 3 Assignment
    Email: nam@njit.edu
    */
?>
<header>
    <style>
        header{
            background-color: #6CFF13;   
            height: 55px;
            width: 101.6%;
            margin: -1%;
        }

        .my_img_logo{
            margin-left: 0px;
            top: 1%;
            bottom: 1%; 
            left: 1%;
            right: 1%;
        }

        #my_first_link{
            background-color: orange;
            padding: 10px;
        }

        #my_second_link{
            margin: 0 auto;
            background-color: yellow;
            padding: 10px;
            
        }

        a{
            bottom: 35%;
            right: 0.2%;
            position: relative;
            margin: 10px;
        }

        #my_third_link{
            background-color: pink;
            padding: 10px;
        }
    </style>

    <img class = "my_img_logo" src = "images\shoe-background.jpg" alt = "shoe-logo" height = "55px" width = "75px">

    <a id = "my_first_link" href = "home.php"> Buy Shoes </a>  <!-- Redirects to current webpage -->

    <a id = "my_second_link" href = "formatted_input.php"> Shipping Info </a> <!-- Redirects to Shoe Sales Info with Default Values -->

    <a id = "my_third_link" href = "shoes.php"> Browse Shoes </a>
</header>