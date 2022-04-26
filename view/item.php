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
    $add_to_cart = $cart->add_to_cart($_SESSION['user']['id'] ,$item_info['id'], $_POST['quantity_for_cart']);
}

function quantity_list(){
    for ($i = 1; $i < 11; $i++){
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
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
        <title><?php echo $item_info['name']; ?></title>
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
                        <form method="post">
                            <?php if(Security::isConnect()){?>
                            <label for="quantity_for_cart">Saisir la quantité voulu</label>
                            <select name="quantity_for_cart" id="quantity_for_cart">
                                <?php quantity_list() ?>
                            </select>
                            <article>
                                <button class = 'button' type="submit" name="cart">Ajouter au panier</button>
                                <a href="store.php"><button class = 'button' type="submit" name="buy">Acheter cet article</button></a>
                                <div class='rating-box'>
                                    <h1>Rating box</h1>
                                </div>
                            </article>
                            <?php } ?>
                        </form>
                    </div>
                </article>
            </section>
            <hr>
            <section>
                <div class="container_com">
                <?php foreach($comment_info as $com){?>
                    <div class="all_com">
                        <div class="com_left">
                            <p class="p_left">Commentaire écrit par : </p><p class="p_left"><?php echo $com['login']?></p>
                            <p>le : <?php echo $com['date'] ?></p>
                        </div>
                        <div class="com_right">
                            <p> <?php echo $com['text'];?></p>
                        </div>
                    </div>
                    <?php
                    }?>
                </div>
                <article class="box_comm"><?php

                    if(Security::isConnect()){?>

                        <form method="post">
                            <label for='comment'>Ecrivez votre meilleur commentaire pour cette article: </label>
                            <textarea class = "send_com" name="comment" rows="10%" cols="90%"></textarea>
                            <button class = 'send_comm' type="submit" name="send"> Envoyer </button>
                        </form>

                    <?php }
                    else{?>
                        <h2>Veuillez vous connecter pour ecrire un commentaire !!</h2>
                    <?php } ?>
                </article>
            </section>

        </main>
        <?php require("footer.php")?>
    </body>
</html>