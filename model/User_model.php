<?php

require_once(__DIR__ . '/../database/database.php');

class User_model{

    public function sql_info_all_user(){
        $req = "SELECT * FROM users";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public static function sql_info_user_id($id){
        $req = "SELECT * FROM users WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id" => $id
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public function sql_modify_login($login_safe, $id){
        $req = "UPDATE users set login = :login WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":login" => $login_safe,
            ":id" => $id
        ));
        $modified = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $modified;
    }

    public function sql_modify_firstname($firstname_safe, $id){
        $req = "UPDATE users set firstname = :firstname WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":firstname" => $firstname_safe,
            ":id" => $id
        ));
        $modified = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $modified;
    }

    public function sql_modify_lastname($lastname_safe, $id){
        $req = "UPDATE users set lastname = :lastname WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":lastname" => $lastname_safe,
            ":id" => $id
        ));
        $modified = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $modified;
    }

    public function sql_modify_email($email_safe, $id){
        $req = "UPDATE users set email = :email WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":email" => $email_safe,
            ":id" => $id
        ));
        $modified = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $modified;
    }

    public function sql_modify_password($password, $id){
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $req = "UPDATE users set password = :password  WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":password" => $password_hash,
            ":id" => $id
        ));
        $modified = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $modified;
    }

    public function sql_ban($reason, $id){
        $req = "INSERT INTO ban (reason, id_user) VALUES (:reason, :id_user)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':reason' => $reason,
            ':id_user' => $id
        ));
    }

    public function sql_unban($id){
        $req = "DELETE FROM ban WHERE id_user = :id_user";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':id_user' => $id
        ));
    }
}

?>