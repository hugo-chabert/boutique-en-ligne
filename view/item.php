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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/item.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Article</title>
    </head>
    <body>
        <?php require("header.php");?>
        <main>

            <section>
                <article>
                    <?php echo '<img src="../public/img/'.$item_info['image'].'">';?>
                    <div>
                        <h2> <?php echo $item_info['name'];?> </h2>
                        <h3> <?php echo $item_info['price'];?> €</h3>
                        <p> <?php echo $item_info['description'];?> </p>
                        <p>
                            <?php
                                if ($item_info['quantity'] == 0){echo 'Article indisponible'; }
                                elseif($item_info['quantity'] < 5) { echo $item_info['quantity'].' restant'; }
                                else {echo '';}
                            ?>
                        </p>
                    </div>
                </article>
                <article>
                    <a href=""><button>Acheter l'article</button></a>
                    <a href=""><button>Ajouter au panier </button></a>
                </article>
            </section>

            <section>
                <?php
                foreach($comment_info as $com){
                    echo $com['text'];?></br><?php
                }

                if(Security::isConnect()){?>

                    <form method="post">
                        <label for='comment'>Votre commentaire : </label>
                        <textarea class = "send_com" name="comment" rows="10%" cols="90%"></textarea>
                        <button class = 'button' type="submit" name="send"> Envoyer </button>
                    </form>

                <?php }
                else{?>
                    <h2>Veuillez vous connecter pour ecrire un commentaire !!</h2>
                <?php } ?>
            </section>

        </main>
        <?php require("footer.php")?>
    </body>
</html>