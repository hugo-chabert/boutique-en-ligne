<?php

require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
}

$user = new User($_SESSION['user']['id']);
$users_info = $user->info_all_user();

if(isset($_POST['ban'])){
    if(!empty($_POST['id']) && !empty($_POST['reason'])){
        foreach($users_info as $u){
            if($_POST['id'] == $u['id']){
                if(Register::check_ban($_POST['id']) == false){
                    $user_ban = new User($u['id']);
                    $ban = $user_ban->ban($_POST['reason'], $_POST['id']);
                    header('Location: admin-user.php');
                    exit();
                }
                else{
                    Toolbox::addMessageAlert("Utilisateur déjà banni", Toolbox::RED_COLOR);
                    header('Location: admin-user.php');
                    exit();
                }
            }
        }
        Toolbox::addMessageAlert("Utilisateur inexistant", Toolbox::RED_COLOR);
    }
    else{
        Toolbox::addMessageAlert("Le champ ne peut être vide", Toolbox::RED_COLOR);
    }
}

if(isset($_POST['unban'])){
    if(!empty($_POST['id2'])){
        if(Register::check_ban($_POST['id2']) == true){
            $user_ban = new User($_POST['id2']);
            $ban = $user_ban->unban($_POST['id2']);
            header('Location: admin-user.php');
            exit();
        }
        else{
            Toolbox::addMessageAlert("Utilisateur non banni ou inexistant", Toolbox::RED_COLOR);
            header('Location: admin-user.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <main>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Login</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users_info as $value) {
                        if(Register::check_ban($value['id']) == false){
                        ?>
                        <tr>
                            <td> <?= $value['id'] ?> </td>
                            <td> <?= $value['login'] ?></td>
                            <td> <?= $value['firstname'] ?></td>
                            <td> <?= $value['lastname'] ?></td>
                            <td> <?= $value['email'] ?></td>
                        </tr>
                    <?php }}
                    ?>
                </tbody>
            </table>
            <form action="" method="post">
                <label>ID :</label>
                <input type="text" name="id" placeholder="Entrez l'ID de l'utilisateur" />
                <label>Raison du ban :</label>
                <input type="text" name="reason" placeholder="Raison du ban" />
                <button type="submit" name="ban">Bannir</button>
                <?php require_once(__DIR__ . '/errors.php'); ?>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Login</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Raison du ban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users_info as $value) {
                        if(Register::check_ban($value['id']) == true){
                            $banned_info = Register::check_ban($value['id']);
                        ?>
                        <tr>
                            <td> <?= $value['id'] ?> </td>
                            <td> <?= $value['login'] ?></td>
                            <td> <?= $value['firstname'] ?></td>
                            <td> <?= $value['lastname'] ?></td>
                            <td> <?= $value['email'] ?></td>
                            <td> <?= $banned_info['reason'] ?></td>
                        </tr>
                    <?php }}
                    ?>
                </tbody>
            </table>
            <form action="" method="post">
                <label>ID :</label>
                <input type="text" name="id2" placeholder="Entrez l'ID de l'utilisateur" />
                <button type="submit" name="unban">Débannir</button>
                <?php require_once(__DIR__ . '/errors.php'); ?>
            </form>
        </div>
    </main>
</body>
</html>