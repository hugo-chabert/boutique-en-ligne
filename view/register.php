<?php

require_once(__DIR__ . '/../model/Register.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(isset($_POST['register'])){
    if(!empty($_POST['login']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['Cpassword'])){
        if($_POST['password'] == $_POST['Cpassword']){
            Register::register_user($_POST['login'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
        }
        else{
            Toolbox::addMessageAlert("Mdp non identique", Toolbox::RED_COLOR);
        }
    }
    else{
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

if(Security::isConnect()){
    header('Location:../index.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/form.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <?php require('header.php') ?>
        <main>
            <form action="" method="post">
                <fieldset>

                    <legend>Saisir toutes vos informations</legend>

                    <label for ="login">Login :</label>
                    <input id="login" type="text" name="login" placeholder="Login" />

                    <label for ="firstname">Prénom :</label>
                    <input id="firstname" type="text" name="firstname" placeholder="Prenom" autocomplete="off">

                    <label for ="lastname">Nom :</label>
                    <input id="lastname" type="text" name="lastname" placeholder="Nom" autocomplete="off">

                    <label for ="email">Email :</label>
                    <input id="email" type="text" name="email" placeholder="Email" autocomplete="off">

                    <label for ="password">  Mot de passe :</label>
                    <input id="password" type="password" name="password" placeholder="Mot de passe" />

                    <label for ="conf-password">Confirmez le mot de passe :</label>
                    <input id="conf-password" type="password" name="Cpassword" placeholder="Confirmez le mot de passe" />

                    <?php require_once(__DIR__ . '/errors.php'); ?>
                </fieldset>
                <button type="submit" name="register">Creer un compte</button>
                <p>Vous avez déjà un compte ? <br><a href="connection.php">Connectez vous</a></p>
            </form>
        </main>
        <?php require('footer.php') ?>
    </body>
</html>