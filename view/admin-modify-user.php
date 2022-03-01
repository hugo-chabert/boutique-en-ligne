<?php

require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../model/User_model.php');
require_once(__DIR__ . '/../model/Comment_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
    exit();
}

if(isset($_POST['del'])){
    Comment::delete($_POST['id']);
}

$user = new User_model();
$user_infos = $user->sql_info_user_id($_GET['id']);

$comment = new Comment();
$comment_info = $comment->info_comments_admin($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion d'un utilisateur</title>
</head>
<body>
    <?php require("header.php");?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Commentaire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($comment_info as $value) {
                    ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['text'] ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
        <form action="" method="post">
            <label>ID :</label>
            <input type="text" name="id" placeholder="Entrez l'ID du commentaire" />
            <button type="submit" name="del">Supprimer</button>
            <?php require_once(__DIR__ . '/errors.php'); ?>
        </form>
    </main>
    <?php require("footer.php")?>
</body>
</html>