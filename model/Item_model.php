<?php

require_once(__DIR__ . '/../database/database.php');

class Item_model{

    public function sql_info_categories(){
        $req = "SELECT * FROM categories";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public static function sql_create($name, $price, $img, $category){
        $req = "INSERT INTO items (name, price, image, id_category) VALUE (:name, :price, :image, :id_category)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':name' => $name,
            ':price' => $price,
            ':image' => $img,
            ':id_category' => $category
        ));
    }
}

?>