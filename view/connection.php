<?php

require_once(__DIR__ . '/../model/Register.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(isset($_POST['connection'])){
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        Register::connection($_POST['login'], $_POST['password']);
    } else {
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
    <title>Connexion</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <fieldset>
                <legend>Connectez-vous juste ici</legend>
                <?php require_once(__DIR__ . '/errors.php'); ?>
                <label>Login :</label>
                <input type="text" name="login" placeholder="login" autocomplete="off">
                <label>Mot de passe :</label>
                <input type="password" name="password" placeholder="Mot de passe" />
            </fieldset>
                <button type="submit" name="connection">Connexion</button>
                <p>Vous n'avez pas de compte? <br><a href="register.php">Creez un compte</a></p>
        </form>
    </main>
</body>
</html>