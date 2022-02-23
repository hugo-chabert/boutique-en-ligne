<?php

require_once(__DIR__ . '/../model/User_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
}

$user = new User_model();
$user_infos = $user->sql_info_user_id($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion d'un utilisateur</title>
</head>
<body>
    <main>
        <?= $user_infos["login"];?>
    </main>
</body>
</html>