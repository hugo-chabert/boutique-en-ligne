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
        header("Location: ../index.php");
        exit();
    }

    public function info_all_user(){
        $results = $this->User_model->sql_info_all_user();
        return $results;
    }

    public function info_user(){
        $results = $this->User_model->sql_info_user_id($this->id);

        return $results;
    }

    public function modify_profil($login, $firstname, $lastname, $email){
        $login_safe = Security::safeHTML($login);
        $firstname_safe = Security::safeHTML($firstname);
        $lastname_safe = Security::safeHTML($lastname);
        $email_safe = Security::safeHTML($email);
        $initial_user = $this->info_user();

        if(filter_var($email_safe, FILTER_VALIDATE_EMAIL)){
            $initial_user = $this->info_user();
            if($initial_user['login'] == $login_safe && $initial_user['firstname'] == $firstname_safe && $profil_user_initial['lastname'] == $lastname_safe && $initial_user['email'] == $email_safe){
                Toolbox::addMessageAlert("Aucune modification !", Toolbox::RED_COLOR);
                header("Location: ./profile_info.php");
                exit();
            }
            elseif($initial_user['login'] == $login_safe){
                if($initial_user['email'] == $email_safe){
                    $this->User_model->sql_modify_profile($login_safe, $firstname_safe, $lastname_safe, $email_safe, $this->id);
                    $resultat = $this->User_model->sql_info_user_id($this->id);
                    $_SESSION['user']['email'] = $resultat['email'];
                    $_SESSION['user']['id'] = $resultat['id'];
                    Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
                    header("Location: ./profile_info.php");
                    exit();
                }
                elseif(Register::info_user_email($email_safe) == false){
                    $this->User_model->sql_modify_profile($login_safe, $firstname_safe, $lastname_safe, $email_safe, $this->id);
                    $resultat = $this->User_model->sql_info_user_id($this->id);
                    $_SESSION['user']['email'] = $resultat['email'];
                    $_SESSION['user']['id'] = $resultat['id_utilisateur'];
                    Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
                    header("Location: ./profile_info.php");
                    exit();
                }
                elseif(Register::info_user_email($email_safe) == true){
                    Toolbox::addMessageAlert("L'email est d??j?? utilis?? !", Toolbox::RED_COLOR);
                    header("Location: ./profile_info.php");
                    exit();
                }
            }
            elseif($initial_user['login'] != $login_safe){
                if(Register::info_user_login($login_safe) == false){
                    if($initial_user['email'] == $email_safe){
                        $this->User_model->sql_modify_profile($login_safe, $firstname_safe, $lastname_safe, $email_safe, $this->id);
                        $resultat = $this->User_model->sql_info_user_id($this->id);
                        $_SESSION['user']['email'] = $resultat['email'];
                        $_SESSION['user']['id'] = $resultat['id'];
                        Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
                        header("Location: ./profile_info.php");
                        exit();
                    }
                    elseif(Register::info_user_email($email_safe) == false){
                        $this->User_model->sql_modify_profile($login_safe, $firstname_safe, $lastname_safe, $email_safe, $this->id);
                        $resultat = $this->User_model->sql_info_user_id($this->id);
                        $_SESSION['user']['email'] = $resultat['email'];
                        $_SESSION['user']['id'] = $resultat['id_utilisateur'];
                        Toolbox::addMessageAlert("Modification ok !", Toolbox::GREEN_COLOR);
                        header("Location: ./profile_info.php");
                        exit();
                    }
                    elseif(Register::info_user_email($email_safe) == true){
                        Toolbox::addMessageAlert("L'email est d??j?? utilis?? !", Toolbox::RED_COLOR);
                        header("Location: ./profile_info.php");
                        exit();
                    }
                }
                elseif(Register::info_user_login($login_safe) == true){
                    Toolbox::addMessageAlert("Le login est d??j?? utilis?? !", Toolbox::RED_COLOR);
                        header("Location: ./profile_info.php");
                        exit();
                }
            }
        }
        else{
            Toolbox::addMessageAlert("Email non valide !", Toolbox::RED_COLOR);
            header("Location: ./profile_info.php");
            exit();
        }
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
            Toolbox::addMessageAlert("Ce login est d??j?? utilis?? !", Toolbox::RED_COLOR);
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
            Toolbox::addMessageAlert("Ce pr??nom est d??j?? utilis?? !", Toolbox::RED_COLOR);
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
            Toolbox::addMessageAlert("Ce nom de famille est d??j?? utilis?? !", Toolbox::RED_COLOR);
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
                Toolbox::addMessageAlert("Cette adresse mail est d??j?? utilis??e !", Toolbox::RED_COLOR);
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
            Toolbox::addMessageAlert("Mot de passe modifi?? !", Toolbox::GREEN_COLOR);
            header("Location: ./profile.php");
            exit();
        }
        else{
            Toolbox::addMessageAlert("Mot de passe erron?? !", Toolbox::RED_COLOR);
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
        Toolbox::addMessageAlert("Utilisateur d??banni !", Toolbox::GREEN_COLOR);
    }

    public function order($id_user, $id_order){
        $results = $this->User_model->sql_order($id_user, $id_order);
        return $results;
    }

}
?>