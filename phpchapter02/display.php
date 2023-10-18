<?php
    // Gets data from the request
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Name Test </title>
        <link rel = "stylesheet" href = "main.css">
    </head>

    <body>
        <h2> Welcome </h2>
        <p> First Name: <?php echo $first_name; ?> </p>
        <p> Last Name: <?php echo $last_name; ?> </p>
    </body>
</html>