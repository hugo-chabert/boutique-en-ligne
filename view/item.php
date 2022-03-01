<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

$item = new Item();
$item_info = $item->display_item($_GET['id']);
$category = $item->display_category($item_info['id_category']);

$comment = new Comment();
$comment_info = $comment->info_comments($item_info['id']);

if(isset($_POST["comment"]) && $_POST["comment"] != NULL){
    Comment_model::write_comment($_POST['comment'], $_SESSION['user']['id'], $item_info['id']);
}

if(empty($_GET['id'])){
    header("Location: store.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/temp.css">
    <title>Article</title>
</head>
<body>
    <main>
        Nom : <?php echo $item_info['name'];?><br/>
        Description : <?php echo $item_info['description'];?></br>
        Prix : <?php echo $item_info['price'];?> €</br>
        Categorie : <?php echo $category['name'];?></br>
        Stocks : <?php echo $item_info['quantity'];?> disponibles</br>
        Image : <?php echo '<img class= image src="../public/img/'.$item_info['image'].'">';?></br>
        <div class="comments">
            <?php
            foreach($comment_info as $com){
                echo $com['text'];?></br><?php
            }

            if(Security::isConnect()){?>
                <form method="post">
                    <a class="comm" >Votre commentaire :<br/>
                        <textarea class = "send_com" name="comment" rows="10%" cols="90%"></textarea>
                    </a>
                    <button class = 'button' type="submit" name="send"> Envoyer </button>
                </form>
            <?php }
            else{?>
                Veuillez vous connecter pour ecrire un commentaire !!
            <?php } ?>
        </div>
    </main>
</body>
</html>