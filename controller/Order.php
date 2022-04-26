<?php

require_once(__DIR__ . '/../model/Order_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');



class Order {

    public function __construct() {
        $this->Order_model = new Order_model();
    }

    public function addOrder($id_user, $id_item, $id_order, $quantity, $price){
        $results = $this->Order_model->sql_addOrder($id_user, $id_item, $id_order, $quantity, $price);
        return $results;
    }

    public function display_order($id_order){
        $results = $this->Order_model->sql_display_order($id_order);
        return $results;
    }
}

?>
