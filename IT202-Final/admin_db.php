<?php
    // Slide 18
    require('database.php');

    // function below validates login
    function is_valid_login($email, $password){
        $db = getDB();
        $query = 'SELECT password FROM shoeManagers
                  WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        if($row === FALSE){ // checks if password is non-existent
            return false;
        }else{
            $hash = $row['password']; // hashes password
            return password_verify($password, $hash); // verifies if pass matches unhashed value
        }
    }

    function getFullName(){
        $db = getDB();
        $my_full_name_query = 'SELECT firstName, lastName, emailAddress 
                            FROM shoeManagers';
        
        $sth = $db->prepare($my_full_name_query);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $row){
            if($row['emailAddress'] == $_SESSION['email']){
                $first_name = $row['firstName'];
                $last_name = $row['lastName'];
                $my_email = $row['emailAddress'];
                $greeting = "Welcome $first_name $last_name ($my_email)";
                break;
            }
        }
        return $greeting;
    }
?>