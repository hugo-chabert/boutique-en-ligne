<?php

require_once(__DIR__ . '/../controller/Item.php');
require_once(__DIR__ . '/../controller/Cart.php');
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

if(isset($_POST['cart'])){
    $cart = new Cart();
    $add_to_cart = $cart->add_to_cart($_SESSION['user']['id'] ,$item_info['id']);
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
    <?php require("header.php");?>
    <main>
        Nom : <?php echo $item_info['name'];?><br/>
        Description : <?php echo $item_info['description'];?></br>
        Prix : <?php echo $item_info['price'];?> €</br>
        Categorie : <?php echo $category['name'];?></br>
        Stocks : <?php echo $item_info['quantity'];?> disponibles</br>
        Image : <?php echo '<img class= image src="../public/img/'.$item_info['image'].'">';?></br>
        <?php
        if($item_info['quantity'] > 0){?>
            <form method="post">
                <button class = 'button' type="submit" name="cart">Ajouter au panier</button>
            </form><?php
        }
        else{
            echo 'Article epuisé';
        }?>
        <div class="comments">
            <?php
            foreach($comment_info as $com){
                echo $com['text'];?></br><?php
            }

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