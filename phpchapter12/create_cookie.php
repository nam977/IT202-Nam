
<html>
    <head>
        <title> My Cookie </title>
    </head>
<body>
    <main>
        <?php
        $cookie_name = "userid";
        $cookie_value = "87";
        $seven_days_in_seconds = 60 * 60 * 24 * 7;

        setcookie($cookie_name, $cookie_value, time() + $seven_days_in_seconds. "/");

        echo "Cookie named $cookie_name is set!";
        ?>
    </main>
</body>
</html>