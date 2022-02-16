<?php

require_once(__DIR__ . '/../model/User_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

class User{

    public $id;

    public function __construct($id){
        $this->id = $id;
        $this->User_model = new User_model();
    }

    public static function disconnect(){
        unset($_SESSION['user']);
    }

    public function info_all_user(){
        $results = $this->User_model->sql_info_all_user();
        return $results;
    }

}
?>