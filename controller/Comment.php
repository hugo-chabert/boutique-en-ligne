<?php

require_once(__DIR__ . '/../model/Comment_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

class Comment{

    public function __construct(){
        $this->Comment_model = new Comment_model();
    }

    public function info_comments($id_item){
        $results = $this->Comment_model->sql_info_comments($id_item);
        return $results;
    }

}

?>