<?php

require_once(__DIR__ . '/../controller/Cart.php');
require_once(__DIR__ . '/../controller/User.php');

session_start();

if(!Security::isConnect()){
    header('Location:../index.php');
}

User::connection($_SESSION['user']['id'], $_SESSION['user']['orders']);
$cart = new Cart();
$items = $cart->display_items($_SESSION['user']['id']);

var_dump($_SESSION['user']);
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
<?php




?>