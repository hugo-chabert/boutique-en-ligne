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
}

?>