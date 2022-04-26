<?php

require_once(__DIR__ . '/../database/database.php');

class Comment_model{

    public function sql_info_comments($id_item){
        $req = "SELECT * FROM comments c INNER JOIN users u WHERE id_item = :id_item AND c.id_user = u.id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_item" => $id_item
        ));
        $results = $stmt->fetchAll();
        $stmt->closeCursor();
        return $results;
    }

    public function sql_info_advices(){
        $req = "SELECT * FROM advices";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public static function write_comment($text, $id_user, $id_item){
        $req = "INSERT INTO comments (text, id_user, id_item) VALUE (:text, :id_user, :id_item)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':text' => $text,
            ':id_user' => $id_user,
            ':id_item' => $id_item
        ));
        header("Location: item.php?id=".$id_item);
        exit();
    }

    public static function write_advice($text, $reason, $id_user){
        $req = "INSERT INTO advices (text, reason, id_user) VALUE (:text, :reason, :id_user)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':text' => $text,
            ':reason' => $reason,
            ':id_user' => $id_user
        ));
        header("Location: ../index.php");
        exit();
    }

    public static function write_advice_noid($text, $reason, $firstname, $lastname, $email){
        $req = "INSERT INTO advices (text, reason, firstname, lastname, email) VALUE (:text, :reason, :firstname, :lastname, :email)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':text' => $text,
            ':reason' => $reason,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email
        ));
        header("Location: ../index.php");
        exit();
    }

    public function sql_info_comments_admin($id_user){
        $req = "SELECT * FROM comments WHERE id_user = :id_user";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user
        ));
        $results = $stmt->fetchAll();
        $stmt->closeCursor();
        return $results;
    }

    public function sql_info_all_comments_admin(){
        $req = "SELECT * FROM comments";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $stmt->closeCursor();
        return $results;
    }

    public static function sql_delete($id){
        $req = "DELETE FROM comments WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':id' => $id
        ));
    }

    public function sql_display_Com_Carousel(){
        $req = "SELECT * FROM advices ORDER BY id DESC LIMIT 3";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $stmt->closeCursor();
        return $results;
    }
}
?>