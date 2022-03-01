<?php

require_once(__DIR__ . '/../model/Comment_model.php');
require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(!Security::isConnect()){
    header('Location:../index.php');
}

$comment = new Comment();
$advice = $comment->info_advices();

if(isset($_POST["comment"]) && $_POST["comment"] != NULL){
    Comment_model::write_advice($_POST['comment'], $_SESSION['user']['id']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vos avis</title>
</head>
<body>
    <main>
        <p>Ici vous pouvez laisser un avis sur le site !!</p>
        <?php
            foreach($advice as $com){
                echo $com['text'];?></br><?php
            }?>
        <form method="post">
            <a class="comm" >Votre commentaire :<br/>
                <textarea class = "send_com" name="comment" rows="10%" cols="90%"></textarea>
            </a>
            <button class = 'button' type="submit" name="send"> Envoyer </button>
        </form>
    </main>
</body>
</html>