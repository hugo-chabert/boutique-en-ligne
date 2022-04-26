<?php

require_once(__DIR__ . '/../model/Cart_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

class Cart{

    public function __construct(){
        $this->Cart_model = new Cart_model();
    }

    public function add_to_cart($id_user, $id_item, $quantity){
        $results = $this->Cart_model->sql_add_to_cart($id_user, $id_item, $quantity);
        return $results;
    }

    public function display_items($id_user){
        $results = $this->Cart_model->sql_display_items($id_user);
        return $results;
    }

    public function change_quantity($id, $quantity){
        $results = $this->Cart_model->sql_change_quantity($id, $quantity);
        return $results;
    }

    public function delete($id){
        $results = $this->Cart_model->sql_delete($id);
        return $results;
    }

    public function removeBuyItem($id_user){
        $results = $this->Cart_model->sql_removeBuyItem($id_user);
        return $results;
    }

    public function deleteCart($id){
        $results = $this->Cart_model->sql_deleteCart($id);
        return $results;
    }
}

?>