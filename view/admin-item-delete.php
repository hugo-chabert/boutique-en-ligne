<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../model/Item_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
    exit();
}

$item = new Item();
$info_item = $item->info_items();

if(isset($_POST['delete'])){
    $delete_item = $item->delete_item($_POST['id']);
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
        <title>Gestion des articles</title>
    </head>
    <body>
        <?php require("header.php");?>
        <main>
        <?php require("side_nav.php");?>
            <section class="profile-content">
                <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Article</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($info_item as $value) {
                                ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <label>ID :</label>
                        <input type="text" name="id" placeholder="Entrez l'ID de l'article" />
                        <button type="submit" name="delete">Supprimer</button>
                        <?php require_once(__DIR__ . '/errors.php'); ?>
                    </form>
            </section>
        </main>
        <?php require('footer.php')?>
    </body>
</html>