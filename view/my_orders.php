<?php

require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

$comment = new Comment();
$comment_info = $comment->info_comments_user($_SESSION['user']['id']);

if(!Security::isConnect()){
    header('Location:../index.php');
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
                            <th>Commentaire</th>
                            <th>Article</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($comment_info as $value) {
                            ?>
                            <tr>
                                <td><?= $value['text'] ?></td>
                                <td><?= $value['name'] ?></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
        <?php require("footer.php")?>
    </body>
</html>