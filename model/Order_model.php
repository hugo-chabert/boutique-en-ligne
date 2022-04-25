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
}

?>