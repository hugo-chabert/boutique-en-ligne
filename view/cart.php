<?php

session_start();

require_once(__DIR__.'/../controller/Cart.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

if(!Security::isConnect()){
    header('Location:../index.php');
}

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
        <input type="checkbox" id="subscribeNews" name="subscribe" value="newsletter">
        <label for="subscribeNews">Souhaitez-vous vous abonner à la newsletter ?</label>
        </form>
    </main>
    <?php require('footer.php');?>
</body>
</html>