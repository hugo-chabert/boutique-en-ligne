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

    public static function sql_create($name, $description, $price, $img, $category){
        $req = "INSERT INTO items (name, description, price, image, id_category) VALUE (:name, :description, :price, :image, :id_category)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':image' => $img,
            ':id_category' => $category
        ));
    }

    public static function sql_check_item($name){
        $req = "SELECT * FROM items WHERE name = :name";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":name" => $name
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }
}

?>