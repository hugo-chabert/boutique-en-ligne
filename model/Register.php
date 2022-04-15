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
                $req = "INSERT INTO users (login, firstname, lastname, email, password, rights) VALUES (:login, :firstname, :lastname, :email, :password, 0)";
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
                Toolbox::addMessageAlert("Ce login est déjà utilisé !", Toolbox::RED_COLOR);
                header("Location: ./register.php");
                exit();
            }

            if(Register::info_user_email($email_safe) == true){
                Toolbox::addMessageAlert("Cette adresse mail est déjà utilisée !", Toolbox::RED_COLOR);
                header("Location: ./register.php");
                exit();
            }
        }
        else{
            Toolbox::addMessageAlert("Cette adresse mail n'est pas valide ! (exemple: michel@gmail.com)", Toolbox::RED_COLOR);
            header("Location: ./register.php");
            exit();
        }
    }

    public static function connection($login, $password){
        $login_safe = Security::safeHTML($login);
        $password_safe = Security::safeHTML($password);

        if(Register::info_user_login($login) == true){
            $results = Register::info_user_login($login);
            if(Register::check_ban($results["id"]) == false){
                if(password_verify($password_safe, $results["password"])){
                    $_SESSION["user"]["id"] = $results["id"];
                    $_SESSION["user"]["login"] = $results["login"];
                    $_SESSION["user"]["rights"] = $results["rights"];
                    $_SESSION["user"]["orders"] = $results["orders"];
                    Toolbox::addMessageAlert("Connexion faite.", Toolbox::GREEN_COLOR);
                    header("Location: ../index.php");
                    exit();
                }
                else{
                    Toolbox::addMessageAlert("Mot de passe incorrect.", Toolbox::RED_COLOR);
                    header("Location: ./connection.php");
                    exit();
                }
            }
            else{
                $ban = Register::check_ban($results['id']);
                echo "Tu es banni, raison : ".$ban['reason'];
            }
        }
        elseif(Register::info_user_login($login) == false){
            Toolbox::addMessageAlert("Login incorrect.", Toolbox::RED_COLOR);
            header("Location: ./connection.php");
            exit();
        }
    }

    public static function info_user($login){
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

    public static function info_user_login($login){
        $req = "SELECT * FROM users WHERE login = :login";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":login" => $login
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public static function info_user_email($email){

        $req = "SELECT * FROM users WHERE email = :email";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":email" => $email
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }

    public static function check_ban($id){
        $req = "SELECT * FROM ban WHERE id_user = :id_user";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id_user" => $id
        ));
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $results;
    }
}