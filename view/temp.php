<?php

require_once(__DIR__ . '/../controller/User.php');
require_once(__DIR__ . '/../controller/Item.php');

session_start();
$item = new Item();
$items_info = $item->info_items();

if (isset($_SESSION['user'])) {
    $id_session = $_SESSION['user']['id'];
    $_SESSION['user_item'] = new User($id_session);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/temp.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="carousel">
        <div class="carousel__face"><span>This is something</span></div>
        <div class="carousel__face"><span>Very special</span></div>
        <div class="carousel__face"><span>Special is the key</span></div>
        <div class="carousel__face"><span>For you</span></div>
        <div class="carousel__face"><span>Just give it</span></div>
        <div class="carousel__face"><span>A try</span></div>
        <div class="carousel__face"><span>And see</span></div>
        <div class="carousel__face"><span>How IT Works</span></div>
        <div class="carousel__face"><span>Woow</span></div>
    </div>
</div>
</body>
</html>