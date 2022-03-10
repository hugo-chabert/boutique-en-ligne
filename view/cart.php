<?php

session_start();

require_once(__DIR__.'/../controller/Cart.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

if(!Security::isConnect()){
    header('Location:../index.php');
}

$cart = new Cart();
$items = $cart->display_items($_SESSION['user']['id']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
</head>
<body>
    <?php require('header.php');?>
    <main>
        <form action="" method="post">
            <?php
            foreach($items AS $i){
                ?><div><?php
                echo '<input type="checkbox" id="item'.$i['id'].'" name="item'.$i['id'].'" value="'.$i['id'].'"></br>';
                echo '<label for="item'.$i['id'].'">'.$i['name'].'</label></br>';
                echo 'Quantité : '.$i['quantity'];
                echo '</br>';
                ?></div><?php
            }
            ?>
        </form>
    </main>
    <?php require('footer.php');?>
</body>
</html>