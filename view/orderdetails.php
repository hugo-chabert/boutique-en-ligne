<?php

require_once(__DIR__ . '/../controller/Cart.php');

session_start();

$cart = new Cart();
$cart_empty = $cart->removeBuyItem($_SESSION['user']['id']);

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

    </main>
    <?php require("footer.php");?>
</body>
</html>