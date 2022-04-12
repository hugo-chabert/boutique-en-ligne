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

$totalPrice = 0;

foreach($items AS $i){
    if(isset($_POST['-'.$i['name']])){
        $new_quantity = $i['quantity'] - 1;
        if($new_quantity < 1){
            $cart = new Cart();
            $delete = $cart->delete($i['id']);
        }
        elseif($new_quantity > 0){
            $cart = new Cart();
            $change_quantity = $cart->change_quantity($i['id'], $new_quantity);
        }
    }
    elseif(isset($_POST['+'.$i['name']])){
        $new_quantity = $i['quantity'] + 1;
        if($new_quantity > 10){
            Toolbox::addMessageAlert("Vous ne pouvez pas commander plus de 10 fois le même objet en une seule commande.", Toolbox::RED_COLOR);
        }
        elseif($new_quantity > 0){
            $cart = new Cart();
            $change_quantity = $cart->change_quantity($i['id'], $new_quantity);
        }
    }
}

if(isset($_POST['payment']) && $totalPrice > 0){
    header('Location: payment.php');
    exit();
}
elseif(isset($_POST['payment']) && $totalPrice == 0){
    Toolbox::addMessageAlert("Votre panier est vide !", Toolbox::RED_COLOR);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
</head>
<body>
    <?php require('header.php');?>
    <main>
    <?php require('errors.php');?>
        <?php
        foreach($items AS $i){
            ?>
            <div>
                <form method="post"><?php
                    $price = $i['price'] * $i['quantity'];
                    echo '<img class= image src="../public/img/'.$i['image'].'">';
                    echo 'Article : '.$i['name'];
                    echo 'Prix : '.$price.' €';
                    echo 'Quantité : ';
                    echo '<button type="submit" name="-'.$i['name'].'">-</button>';
                    echo $i['quantity'];
                    echo '<button type="submit" name="+'.$i['name'].'">+</button>';
                    ?>
                </form>
            </div>
            <?php
            $totalPrice = $totalPrice + $price;
        }
        echo 'Prix total : '.$totalPrice.' €';
        ?>
        <form action="" method="post">
            <button type="submit" name="payment">Payer</button>
        </form>
    </main>
    <?php require('footer.php');?>
</body>
</html>