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

    public function info_advices(){
        $results = $this->Comment_model->sql_info_advices();
        return $results;
    }

    public function info_comments_admin($id_user){
        $results = $this->Comment_model->sql_info_comments_admin($id_user);
        return $results;
    }

    public function info_all_comments_admin(){
        $results = $this->Comment_model->sql_info_all_comments_admin();
        return $results;
    }

    public static function delete($id){
        Comment_model::sql_delete($id);
    }

}

?>