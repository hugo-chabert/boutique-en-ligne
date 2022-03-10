<?php

require_once(__DIR__ . '/../model/Cart_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

class Cart{

    public function __construct(){
        $this->Cart_model = new Cart_model();
    }

    public function add_to_cart($id_user, $id_item){
        $results = $this->Cart_model->sql_add_to_cart($id_user, $id_item);
        return $results;
    }

    public function display_items($id_user){
        $results = $this->Cart_model->sql_display_items($id_user);
        return $results;
    }

}

?>