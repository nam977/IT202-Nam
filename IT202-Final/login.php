<?php
session_start();
$_SESSION["is_valid_user"] = 0; // sets inital login session value as 0
/*
if(isset($_SESSION["is_valid_user"])){
    header("location:logged_in_home.php");
}*/
if(!isset($login_message)){
    $login_message = "You must login to view this page.";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            input{
                margin: 10px;
                font-size: 30px;
            }

            form{
                font-size: 50px;
            }

            h1{
                font-size: 70px;
                background-color: white;
                width: 200px;
                text-align: center;
            }

            .login_message{
                font-size: 45px;
                background-color: white;
                padding: 15px;
                width: 700px;
            }
            .label-color{
                background-color: white;
                margin: 10px;
            }

            body{
                background-color: #29ADB2;/*url("https://cdn.pixabay.com/photo/2015/11/13/14/35/shoes-1042070_1280.jpg");*/
            }

            .main-body{
                margin: 0% 30%;
            }
        </style>
        <title> My Shoe Shop </title>
    </head>    
    <body>
    <main>
        <div class = "header">
            <?php include("header.php"); ?>
        </div>

        <div class = "main-body">
            <div class = "form-page-main">
                <h1> Login: </h1>
                <form action = "authenticator.php" method = "post">

                    <label class = "label-color"> Email: </label>
                    <input type = "text" id = "email" name = "email" value = "">
                    <br>

                    <label class = "label-color"> Password: </label>
                    <input type = "password" id = "password" name = "password" value = "">
                    <br>

                    <input type = "submit" value = "Login">
                </form>
            </div>
            <p class = "login_message"> <?php echo $login_message; ?></p>
        </div>

        <div id = "footer-id">
            <?php include("footer.php"); ?>
        </div>
    </main>
    </body>
</html>