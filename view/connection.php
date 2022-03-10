<?php

require_once(__DIR__ . '/../model/Register.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(isset($_POST['connection'])){
    if(!empty($_POST['login']) && !empty($_POST['password'])){
        Register::connection($_POST['login'], $_POST['password']);
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
        <title>Connexion</title>
    </head>
    <body>
        <?php require('header.php');?>
        <main>
            <form action="" method="post">
                <fieldset>
                    <legend>Connectez-vous juste ici</legend>
                    <label for='login'>Login :</label>
                    <input type="text" name="login" placeholder="Login" autocomplete="off">
                    <label for='password'>Mot de passe :</label>
                    <input type="password" name="password" placeholder="Mot de passe" />
                    <?php require_once(__DIR__ . '/errors.php'); ?>
                </fieldset>
                <button type="submit" name="connection">Connexion</button>
                <p>Vous n'avez pas de compte? <br><a href="register.php">Creez un compte</a></p>
            </form>
        </main>
        <?php require('footer.php');?>
    </body>
</html>