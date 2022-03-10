<?php

require_once(__DIR__ . '/../database/database.php');

class Cart_model{

    public function sql_add_to_cart($id_user, $id_item){
        $req = "SELECT * FROM carts WHERE id_user = :id_user AND id_item = :id_item";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user,
            ":id_item" => $id_item
        ));
        $row = $stmt->rowCount();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if($row > 0){
            $new_quantity = $results['quantity'] + 1;
            $req = "UPDATE carts SET quantity = :new_quantity WHERE id_user = :id_user AND id_item = :id_item ";
            $stmt = Database::connect_db()->prepare($req);
            $stmt->execute(array(
                ":id_user" => $id_user,
                ":id_item" => $id_item,
                ":new_quantity" => $new_quantity
            ));
            header("Location: cart.php");
            exit();
        }
        elseif($row == 0){
            $req = "INSERT INTO carts (id_user, id_item, quantity) VALUE (:id_user, :id_item, 1)";
            $stmt = Database::connect_db()->prepare($req);
            $stmt->execute(array(
                ':id_user' => $id_user,
                ':id_item' => $id_item
            ));
            header("Location: cart.php");
            exit();
        }
    }

}
?>