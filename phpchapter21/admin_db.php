<?php
    // Slide 18
    require_once('database.php');

    function is_valid_admin_login($email, $password){
        $db = getDB();
        $query = 'SELECT password FROM administrators
                  WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        if($row === FALSE){
            return false;
        }else{
            $hash = $row['password'];
            return password_verify($password, $hash);
        }
    }
?>