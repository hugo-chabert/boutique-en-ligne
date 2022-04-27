<?php

require_once(__DIR__ . '/../controller/Order.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();


$order_id = $_SESSION['user']['orders'];
$order = new Order();
$user_order_id = $order->info_order_user_id($_SESSION['user']['id'], $order_id);

if(!Security::isConnect()){
    header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/admin_item.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Vos commandes</title>
    </head>
    <body>
        <?php require("header.php");?>
        <main>
            <?php require("side_nav.php")?>
            <section class="profile-content">
                <div>
                    <?php
                    while($user_order == true){
                        $user_order_id = $order->info_order_user_id($_SESSION['user']['id'], $order_id);
                        foreach($user_order_id AS $uoid){
                            echo $uoid['id'];
                        }
                        $order_id =- 1;
                        ?><br> <?php
                    }
                    ?>
                </div>
            </section>
        </main>
        <?php require("footer.php")?>
    </body>
</html>