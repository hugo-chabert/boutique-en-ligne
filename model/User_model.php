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

    public function sql_modify_profile($login, $firstname, $lastname, $email, $id){
        $req = "UPDATE users set login = :login, firstname = :firstname, lastname = :lastname, email = :email WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":login" => $login,
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":email" => $email,
            ":id" => $id
        ));
        $results = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $results;
    }

    public function sql_modify_profile_without_email($login_secure, $prenom_secure, $nom_secure, $id){
        $req = "UPDATE utilisateurs set login = :login, prenom = :prenom, nom = :nom WHERE id_utilisateur = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":login" => $login_secure,
            ":prenom" => $prenom_secure,
            ":nom" => $nom_secure,
            ":id" => $id
        ));
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
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

    public function sql_order($id_user, $orders){
        $orders+=1;
        $req = "UPDATE users SET orders = :orders WHERE id = :id_user";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':id_user' => $id_user,
            ':orders' => $orders
        ));
    }
}

?>