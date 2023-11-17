<?php
$search_var = $_GET['search'];
echo htmlspecialchars($search_var);

require_once('database.php');

$db = getDB();

$search_query = new PDO($dsn, $username, $password);

$query = 'SELECT * FROM products where productCode = :search OR productName = :search';
$statemen1 = $db->prepare($query);
?>

<html>
    <head>
        <title> Question 01 </title>
    </head>

    <body>
        <form action = "question01.php" method = "get">
            <label> Search text: </label>
           <input type = "text" id = "search" name = "search">

           <label> Submit </label>
           <input type = "submit" name = "submit">
           <br>
        </form>

        </p> <?php echo htmlspecialchars($search_var); ?> </p>
    </body>

</html>
