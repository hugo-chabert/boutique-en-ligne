<?php

require_once(__DIR__ . '/../controller/Cart.php');
require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../controller/Order.php');


session_start();

if(!Security::isConnect()){
    header('Location:../index.php');
}

$user = new User($_SESSION['user']['id']);
$add_order = $user->order($_SESSION['user']['id'], $_SESSION['user']['orders']);
$new_user_order = $user->info_user();
$cart = new Cart();
$items = $cart->display_items($_SESSION['user']['id']);
$order = new Order();
$_SESSION['user']['orders'] = $new_user_order['orders'];

foreach($items AS $i){
    $price = $i['price']*$i['quantity'];
    $add_order = $order->addOrder($i['id_user'], $i['id_item'], $_SESSION['user']['orders'], $i['quantity'], $price);
    $delete_cart = $cart->deleteCart($i['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/root&font.css">
    <title>Détails de la commande</title>
</head>
<body>
    <?php require("header.php");?>
    <main>
        <p>Votre commande à bien été envoyé. Si vous voulez voir la comande plus en detail allez dans votre profil.</p>
    </main>
    <?php require("footer.php");?>
</body>
</html>
<?php




?>