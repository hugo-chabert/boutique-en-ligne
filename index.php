<?php

require_once(__DIR__ . '/controller/User.php');

session_start();


if (isset($_SESSION['user'])) {
    $id_session = $_SESSION['user']['id'];
    $_SESSION['user_item'] = new User($id_session);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php require("view/header_index.php");?>
    <main>
    <?php require_once(__DIR__ . '/view/errors.php'); ?>
    </main>
    <?php require("view/footer_index.php");?>
</body>
</html>
