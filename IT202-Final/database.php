<?php
    // Slide 26
    function getDB(){
        $local_dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
        $local_username = "mgs_user";
        $local_password = 'pa55word';

        $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=nam';
        $njit_username = 'nam';
        $njit_password = '5CP_61o-12';

        // TODO create variables for NJIT Server
        $dsn = $njit_dsn;
        $username = $njit_username;
        $password = $njit_password;

        try{
            $db = new PDO($dsn, $username, $password);
        }catch(PDOException $exception){
            $error_message = $exception->getMessage();
            include("database_error.php");
            exit();
        }
        return $db;
    }

    // add_shoe_manager addes new user, along with entered password, first/last name & email  
    function add_shoe_manager($email, $password, $first_name, $last_name) {
        $db = getDB(); // retrieves sql nam database
        $hash = password_hash($password, PASSWORD_DEFAULT); // hashes user password with PASSWORD_DEFAULT encryption
        $query = 'INSERT INTO shoeManagers (emailAddress, password, firstName, lastName)
                  VALUES (:email, :password, :first_name, :last_name)'; // inserts newly created user in shoeManagers table
        $statement = $db->prepare($query); // loads $query value with sql statement
        $statement->bindValue(':email', $email); 
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->execute();
        $statement->closeCursor();
    }
?>