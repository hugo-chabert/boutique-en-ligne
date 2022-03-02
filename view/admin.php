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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/admin.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Admin</title>
    </head>
    <body>
        <main>
        <a href= admin-user.php>Gestion des utilisateurs</a>
        <a href= admin-item.php>Gestion des articles</a>
        </main>
    </body>
</html>