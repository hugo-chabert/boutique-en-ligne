<?php


require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

$item = new Item();
$item_info = $item->display_item($_GET['id']);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/temp.css">
    <title>Article</title>
</head>
<body>
    <main>
        Nom : <?php echo $item_info['name'];?>
        Description : <?php echo $item_info['description'];?>
        Prix : <?php echo $item_info['price'];?>
        Categorie : <?php echo $item_info['id_category'];?>
        Image : <?php echo '<img class= image src="../public/img/'.$item_info['image'].'">';?>
    </main>
</body>
</html>