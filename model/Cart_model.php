<?php

require_once(__DIR__ . '/../database/database.php');

class Cart_model{

    public function check_if_multiple_item($id_user, $id_item){
        $req = "SELECT * FROM carts WHERE id_user = :id_user AND id_item = :id_item";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id_user,
            ":id_item" => $id_item
        ));
        return $results;
    }

    public function sql_add_to_cart($id_user, $id_item){
        if(check_if_multiple_item($id_user, $id_item) == true){
            echo 'oui';
        }
        else{
            $req = "INSERT INTO carts (id_user, id_item) VALUE (:id_user, :id_item)";
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