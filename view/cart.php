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

if(isset($_POST['payment'])){
    header('Location: payment.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/cart.css">
    <link rel="stylesheet" href="../public/css/root&font.css">
    <title>Panier</title>
</head>
<body>
    <?php require('header.php');?>
    <main>
        <?php require("side_nav.php")?>
        <section class="profile-content">
            <h1>Votre Panier</h1>
            <?php require('errors.php');?>
            <?php
            foreach($items AS $i){
                ?>
                <div>
                    <form method="post"><?php
                        $price = $i['price'] * $i['quantity'];
                        echo '<img class= "image-art" src="../public/img/'.$i['image'].'">';
                        echo '<div> Article : '.$i['name'].'<br>';
                        echo 'Prix : '.$price.' €'.'<br>';
                        echo 'Quantité : ';
                        echo '<button type="submit" name="-'.$i['name'].'">-</button>'.$i['quantity'].'<button type="submit" name="+'.$i['name'].'">+</button> </div>';
                        ?>
                    </form>
                </div>
                <hr>
                <?php
                $totalPrice = $totalPrice + $price;
            }
            ?>
            <form action="" method="post">
                <?php echo '<h2>Prix total : '.$totalPrice.' €</h2>'; ?>
                <?php if ($totalPrice > 0){?>
                    <button type="submit" name="payment">Payer</button>
                <?php } ?>
            </form>
        </section>
    </main>
    <?php require('footer.php');?>
</body>
</html>