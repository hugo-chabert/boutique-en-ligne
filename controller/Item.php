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

    public function info_items(){
        $results = $this->Item_model->sql_info_items();
        return $results;
    }

    public function display_item($id){
        $results = $this->Item_model->sql_display_item($id);
        return $results;
    }

    public function display_category($id_category){
        $results = $this->Item_model->sql_display_category($id_category);
        return $results;
    }

    public function searchBar($name){
        $results = $this->Item_model->sql_searchBar($name);
        return $results;
    }

    public function searchCategory($category){
        $results = $this->Item_model->sql_searchCategory($category);
        return $results;
    }

    public function lastItem(){
        $results = $this->Item_model->sql_lastItem();
        return $results;
    }
}

?>