<?php

require_once(__DIR__ . '/../model/Comment_model.php');
require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if($_SESSION['user']['rights'] != 1){
    header('Location:../index.php');
}

$comment = new Comment();
$advice = $comment->info_advices();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vos avis</title>
</head>
<body>
    <?php require("header.php");?>
    <main>
        <p>Ici vous pouvez laisser un avis sur le site !!</p>
        <?php
            foreach($advice as $com){
                echo $com['text'];?></br><?php
            }?>
    </main>
    <?php require("footer.php")?>
</body>
</html>