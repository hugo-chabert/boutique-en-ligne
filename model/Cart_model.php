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
            $req = "UPDATE carts SET quantity = :new_quantity WHERE id_user = :id_user AND id_item = :id_item";
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

    public function sql_display_items($id_user){
        $req = "SELECT c.id AS id, c.id_user AS id_user, c.id_item AS id_item, c.quantity AS quantity, i.name AS name, i.price AS price, i.image AS image, i.id_category AS id_category
        FROM carts c INNER JOIN items i WHERE c.id_user = :id_user AND c.id_item = i.id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user
        ));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public function sql_change_quantity($id, $quantity){
        $req = "UPDATE carts SET quantity = :new_quantity WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
            $stmt->execute(array(
                ":id" => $id,
                ":new_quantity" => $quantity
            ));
            header("Location: cart.php");
            exit();
    }

    public function sql_delete($id){
        $req = "DELETE FROM carts WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
            $stmt->execute(array(
                ":id" => $id
            ));
            header("Location: cart.php");
            exit();
    }

}
?>