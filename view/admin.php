<?php

require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <?php require("header.php");?>
    <main>
        <a href= admin-user.php>Gestion des utilisateurs</a>
        <a href= admin-item.php>Gestion des articles</a>
    </main>
    <?php require("footer.php")?>
</body>
</html>