<?php

session_start();

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

    </main>
    <?php require('footer.php');?>
</body>
</html>