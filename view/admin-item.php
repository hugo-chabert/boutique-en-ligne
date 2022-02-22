<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location: ../index.php');
}

$item = new Item();
$categories_info = $item->info_categories();

if(isset($_POST['create'])){
    if(!empty($_POST['name']) && !empty($_POST['price'])){
        Item::create($_POST['name'], $_POST['price'], 'img', $_POST['categories']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des articles</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <label>Nom de l'article :</label>
            <input type="text" name="name" placeholder="Entrez le nom de l'article" />
            <label>Prix :</label>
            <input type="text" name="price" placeholder="Entrez le prix" />
            <select name="categories" size="1">
                <?php foreach($categories_info as $c){
                    echo '<option value="'.$c["id"].'">'.$c["name"];
                }?>
            </select>
            <button type="submit" name="create">Creer</button>
            <?php require_once(__DIR__ . '/errors.php'); ?>
        </form>
    </main>
</body>
</html>