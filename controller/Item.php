<?php

require_once(__DIR__ . '/../model/Item_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

class Item{

    public function __construct(){
        $this->Item_model = new Item_model();
    }

    public static function create($name, $description, $price, $img, $category){
        $name_safe = Security::safeHTML($name);
        $results = Item_model::sql_create($name_safe, $description, $price, $img, $category);
        Toolbox::addMessageAlert("Article créé !", Toolbox::GREEN_COLOR);
        return $results;
    }

    public function info_categories(){
        $results = $this->Item_model->sql_info_categories();
        return $results;
    }
}

?>