<?php

require_once(__DIR__ . '/../model/Register.php');
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

    public function info_user(){
        $results = $this->User_model->sql_info_user_id($this->id);

        return $results;
    }

    public function modify_login($login){
        $login_safe = Security::safeHTML($login);
        $initial_user = $this->info_user();

        if($initial_user['login'] == $login_safe) {
            Toolbox::addMessageAlert("Aucune modification !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        elseif(Register::info_user_login($login_safe) == false){
            $this->User_model->sql_modify_login($login_safe, $this->id);
            $results = $this->User_model->sql_info_user_id($this->id);
            $_SESSION['user']['login'] = $results['login'];
            $_SESSION['user']['id'] = $results['id'];
            Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        elseif(Register::info_user_login($login_safe) == true){
            Toolbox::addMessageAlert("Ce login est déjà utilisé !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
    }

    public function modify_firstname($firstname){
        $firstname_safe = Security::safeHTML($firstname);
        $initial_user = $this->info_user();

        if($initial_user['firstname'] == $firstname_safe){
            Toolbox::addMessageAlert("Aucune modification !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        elseif(Register::info_user_firstname($firstname_safe) == false){
            $this->User_model->sql_modify_firstname($firstname_safe, $this->id);
            $results = $this->User_model->sql_info_user_id($this->id);
            $_SESSION['user']['firstname'] = $results['firstname'];
            $_SESSION['user']['id'] = $results['id'];
            Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        elseif(Register::info_user_firstname($firstname_safe) == true){
            Toolbox::addMessageAlert("Ce prénom est déjà utilisé !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
    }

    public function modify_lastname($lastname){
        $lastname_safe = Security::safeHTML($lastname);
        $initial_user = $this->info_user();

        if($initial_user['lastname'] == $lastname_safe){
            Toolbox::addMessageAlert("Aucune modification !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        elseif(Register::info_user_lastname($lastname_safe) == false){
            $this->User_model->sql_modify_lastname($lastname_safe, $this->id);
            $results = $this->User_model->sql_info_user_id($this->id);
            $_SESSION['user']['lastname'] = $results['lastname'];
            $_SESSION['user']['id'] = $results['id'];
            Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        elseif(Register::info_user_lastname($lastname_safe) == true){
            Toolbox::addMessageAlert("Ce nom de famille est déjà utilisé !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
    }

    public function modify_email($email){
        $email_safe = Security::safeHTML($email);
        $initial_user = $this->info_user();

        if(filter_var($email_safe, FILTER_VALIDATE_EMAIL)){
            if($initial_user['email'] == $email_safe){
                Toolbox::addMessageAlert("Aucune modification !", Toolbox::RED_COLOR);
                header("Location: ./profile.php");
                exit();
            }
            elseif(Register::info_user_email($email_safe) == false){
                $this->User_model->sql_modify_email($email_safe, $this->id);
                $results = $this->User_model->sql_info_user_id($this->id);
                $_SESSION['user']['email'] = $results['email'];
                $_SESSION['user']['id'] = $results['id'];
                Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
                header("Location: ./profile.php");
                exit();
            }
            elseif(Register::info_user_email($email_safe) == true){
                Toolbox::addMessageAlert("Cette adresse mail est déjà utilisée !", Toolbox::RED_COLOR);
                header("Location: ./profile.php");
                exit();
            }
        }
        else{
            Toolbox::addMessageAlert("Cette adresse mail n'est pas valide ! (exemple: michel@gmail.com)", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
    }

    public function modify_password($old_password, $new_password){
        $old_password_safe = Security::safeHTML($old_password);
        $new_password_safe = Security::safeHTML($new_password);
        $password_db = $this->User_model->sql_info_user_id($this->id);
        $password_db['password'];

        if(password_verify($old_password_safe, $password_db['password'])){
            $this->User_model->sql_modify_password($new_password_safe, $this->id);
            Toolbox::addMessageAlert("Mot de passe modifié !", Toolbox::GREEN_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        else{
            Toolbox::addMessageAlert("Mot de passe erroné !", Toolbox::RED_COLOR);
            header("Location: ./profile.php");
            exit();
        }
    }

    public function ban($reason, $id){
        $id_safe = Security::safeHTML($id);
        $this->User_model->sql_ban($reason, $id_safe);
        Toolbox::addMessageAlert("Utilisateur banni !", Toolbox::GREEN_COLOR);
    }

    public function unban($id){
        $id_safe = Security::safeHTML($id);
        $this->User_model->sql_unban($id_safe);
        Toolbox::addMessageAlert("Utilisateur débanni !", Toolbox::GREEN_COLOR);
    }

}
?>