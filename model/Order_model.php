<?php

require_once(__DIR__ . '/../database/database.php');

class Order_model{

    public function sql_addOrder($id_user, $id_item, $id_order, $quantity, $price){
        $req = "INSERT INTO orders (id_user, id_item, id_order, quantity, price) VALUE (:id_user, :id_item, :id_order, :quantity, :price)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ':id_user' => $id_user,
            ':id_item' => $id_item,
            ':id_order' => $id_order,
            ':quantity' => $quantity,
            ':price' => $price
        ));
    }

    public function sql_display_order($id_order){
        $req = "SELECT c.id AS id, c.id_user AS id_user, c.id_item AS id_item, c.id_order AS id_order, c.quantity AS quantity, c.price AS priceO, i.name AS name, i.price AS price, i.image AS image, i.id_category AS id_category
        FROM orders c INNER JOIN items i WHERE c.id_order = :id_order AND c.id_item = i.id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_order" => $id_order
        ));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public function sql_info_order_user($id_user){
        $req = "SELECT * FROM orders WHERE id_user = :id_user";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user
        ));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public function sql_info_order_user_id($id_user, $id_order){
        $req = "SELECT * FROM orders WHERE id_user = :id_user AND id_order = :id_order";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user,
            ":id_order" => $id_order
        ));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }
}

?>