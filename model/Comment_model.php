<?php

require_once(__DIR__ . '/../database/database.php');

class Comment_model{

    public function sql_info_comments($id_item){
        $req = "SELECT * FROM comments WHERE id_item = :id_item";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_item" => $id_item
        ));
        $results = $stmt->fetchAll();
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
    }
}
?>