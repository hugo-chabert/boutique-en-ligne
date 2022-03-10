<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

$item = new Item();
$items_info = $item->info_items();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <link rel="stylesheet" href="../public/css/temp.css">
</head>
<body>
    <?php require("header.php");?>
    <main>
        <?php foreach($items_info as $item){
            echo '<div>'.$item['name'].$item['price'].'<img class= image src="../public/img/'.$item['image'].'">';
            echo '<button><a href="item.php?id='.$item['id'].'">Aller à l article</a></button></div>';
        }?>
    </main>
    <?php require("footer.php");?>
</body>
</html>