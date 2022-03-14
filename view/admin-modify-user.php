<?php

require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../model/User_model.php');
require_once(__DIR__ . '/../model/Comment_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(empty($_GET['id'])){
    $comment = new Comment();
    $comment_info = $comment->info_all_comments_admin();
}
else{
    $comment = new Comment();
    $comment_info = $comment->info_comments_admin($_GET['id']);
}

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
    exit();
}

if(isset($_POST['del'])){
    Comment::delete($_POST['id']);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/admin_item.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Gestion d'un utilisateur</title>
    </head>
    <body>
        <?php require("header.php");?>
        <main>
            <?php require("side_nav.php")?>
            <section class="profile-content">
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
            </section>
        </main>
        <?php require("footer.php")?>
    </body>
</html>