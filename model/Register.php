<?php
require_once(__DIR__ . '/../database/database.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

class Register{

    public static function register_user($login, $firstname, $lastname, $email, $password){
        $login_safe = Security::safeHTML($login);
        $firstname_safe = Security::safeHTML($firstname);
        $lastname_safe = Security::safeHTML($lastname);
        $email_safe = Security::safeHTML($email);
        $password_safe = Security::safeHTML($password);

        if(filter_var($email_safe, FILTER_VALIDATE_EMAIL)){
            if(Register::info_user_login($login_safe) == false && Register::info_user_email($email_safe) == false){
                $password_hash = password_hash($password_safe, PASSWORD_BCRYPT);
                $req = "INSERT INTO users (login, firstname, lastname, email, password, id_right) VALUES (:login, :firstname, :lastname, :email, :password, 1)";
                $stmt = Database::connect_db()->prepare($req);
                $stmt->execute(array(
                    ":login" => $login_safe,
                    ":firstname" => $firstname_safe,
                    ":lastname" => $lastname_safe,
                    ":email" => $email_safe,
                    ":password" => $password_hash
                ));
                Toolbox::addMessageAlert("Le compte est créé!", Toolbox::GREEN_COLOR);
                header("Location: ../index.php");
                exit();
            }

            if(Register::info_user_login($login_safe) == true){
                Toolbox::addMessageAlert("Login est déjà utilisé !", Toolbox::RED_COLOR);
                header("Location: ./register.php");
                exit();
            }

            if(Register::info_user_email($email_safe) == true){
                Toolbox::addMessageAlert("L'email est déjà utilisé !", Toolbox::RED_COLOR);
                header("Location: ./register.php");
                exit();
            }
        }
        else{
            Toolbox::addMessageAlert("L'email n'est pas valide !", Toolbox::RED_COLOR);
            header("Location: ./register.php");
            exit();
        }
    }

    public static function connection($login, $password){
        $login_safe = Security::safeHTML($login);
        $password_safe = Security::safeHTML($password);

        if(Register::info_user_login($login) == true){
            $results = Register::info_user_login($login);
            if(password_verify($password_safe, $results['password'])){
                $_SESSION['user']['id'] = $results['id'];
                $_SESSION['user']['login'] = $results['login'];
                Toolbox::addMessageAlert("Connexion faite.", Toolbox::GREEN_COLOR);
                header("Location: ../index.php");
                exit();
            }
            else{
                Toolbox::addMessageAlert("Mdp incorrect.", Toolbox::RED_COLOR);
                header("Location: ./connection.php");
                exit();
            }
        }
        elseif(Register::info_user_login($login) == false){
            Toolbox::addMessageAlert("Login incorrect.", Toolbox::RED_COLOR);
            header("Location: ./connection.php");
            exit();
        }
    }

    public static function info_user_login($login){
        $login_safe = Security::safeHTML($login);

        $req = "SELECT * FROM users WHERE login = :login";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":login" => $login_safe
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public static function info_user_email($email){
        $email_safe = Security::safeHTML($email);

        $req = "SELECT * FROM users WHERE email = :email";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":email" => $email_safe
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }
}