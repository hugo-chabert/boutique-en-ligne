<?php

require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(isset($_SESSION['user_item'])){
    $user_info = $_SESSION['user_item']->info_user();
}

if(isset($_POST['submit_infos'])){
    if(!empty($_POST['login']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])){
        $_SESSION['user_item']->modify_profil($_POST['login'], $_POST['firstname'], $_POST['lastname'], $_POST['email']);
    }
    else{
        Toolbox::addMessageAlert("Les champs ne peuvent pas être vide.", Toolbox::RED_COLOR);
        header("Location: ./profile_info.php");
        exit();
    }
}

if(isset($_POST['submit_password'])){
    if(!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['confnew_password'])){
        if($_POST['new_password'] == $_POST['confnew_password']){
            $_SESSION['user_item']->modify_password($_POST['old_password'], $_POST['new_password']);
        }

        if($_POST['new_password'] !== $_POST['confnew_password']){
            Toolbox::addMessageAlert("Mots de passe différents !", Toolbox::RED_COLOR);
            header("Location: ./profile_info.php");
            exit();
        }
    }
    else{
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
        header("Location: ./profile_info.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/info.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Profil</title>
    </head>
    <body>
        <?php require('header.php') ?>
        <main>
            <?php require("side_nav.php"); ?>

            <section class="profile-content">

                <form action="profile_info.php" method="post" >

                    <fieldset>
                        <legend>Modification du login</legend>

                        <label for="login"> Login </label>
                        <input type="text" name="login" value="<?= $user_info['login'] ?>" autocomplete="off">

                        <label for="firstname"> Prénom </label>
                        <input type="text" name="firstname" value="<?= $user_info['firstname'] ?>" autocomplete="off">

                        <label for="lastname"> Nom de famille </label>
                        <input type="text" name="lastname" value="<?= $user_info['lastname'] ?>" autocomplete="off">

                        <label for="email"> Adresse mail </label>
                        <input type="text" name="email" value="<?= $user_info['email'] ?>" autocomplete="off">

                        <button type="submit" name="submit_infos">Modifier les infos</button>

                    </fieldset>

                    <?php require_once(__DIR__ . '/errors.php'); ?>
                </form>

                <form action="profile_info.php" method="post">

                    <fieldset>
                        <legend>Modification du mot de passe</legend>
                        <label for="old_password">Ancien mot de passe</label>
                        <input type="password" name="old_password" autocomplete="off" placeholder="Ancien mot de passe">
                        <label for="new_password">Nouveau mot de passe</label>
                        <input type="password" name="new_password" autocomplete="off" placeholder="Nouveau mot de passe">
                        <label for="confnew_password">Confirmation du nouveau mot de passe</label>
                        <input type="password" name="confnew_password" autocomplete="off" placeholder="Confirmation mot de passe">
                        <button type="submit" name="submit_password">Modifier le mot de passe</button>

                    </fieldset>
                    <?php require_once(__DIR__ . '/errors.php'); ?>
                </form>
            </section>
        </main>
        <?php require('footer.php') ?>
    </body>
</html>