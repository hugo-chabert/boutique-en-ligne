<?php

require_once(__DIR__ . '/controller/User.php');
require_once(__DIR__ . '/controller/Item.php');
require_once(__DIR__ . '/controller/Comment.php');

session_start();
$item = new Item();
$items_info = $item->info_items();
$last_item = $item->lastItem();
$caroussel = $item->display_Item_Carousel();
$com = new Comment();
$caroussel2 = $com->display_Com_Carousel();

if(isset($_SESSION['user'])) {
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
        <link rel="stylesheet" href="public/css/index.css">
        <link rel="stylesheet" href="public/css/root&font.css">
        <title>Accueil</title>
    </head>
    <body>
        <?php require("view/header_index.php");?>
        <?php require('view/errors.php');?>
        <main>

            <section class="pres-site">
                <article>
                    <div class ='shadow'>
                        <h1>
                            Takahiro Arts, <br>
                            Notre seule limite c'est vous
                        </h1>
                        <a href="view/store.php"><button>Decouvrir un nouveau monde</button></a>
                    </div>
                </article>

                <article>
                    <h1>L'exclusivite du mois !!!</h1>

                    <section class="month-item">
                        <img src="public/img/<?php echo $last_item['image']?>" alt="test">
                        <div class="info-item">
                            <h2><?php echo $last_item['name']?></h2>
                            <h3><?php echo $last_item['price']?> $</h3>
                            <p>
                                <?php echo $last_item['description']?>
                            </p>
                            <a href="view/item.php?id=<?php echo $last_item['id'] ?>"><button>Voir Plus</button></a>
                        </div>
                    </section>
                </article>

            </section>

            <section class="parallax-1">

            </section>

            <section class="best-seller">
                <h1>Les dernieres nouveautes !!</h1>
                <div class="container">
                    <?php foreach($caroussel as $item){?>
                        <div class="card">
                            <h2 class='title'><?php echo $item['name'];?></h2>
                            <div class="bar">
                                <div class="emptybar"></div>
                                <div class="filledbar"></div>
                            </div>
                            <div class="circle">
                                <img class= 'image-article' src="public/img/<?php echo $item['image'];?>" >
                                <a href="view/item.php?id= <?php echo $item['id'] ?>">
                                    <button class="button-card">Voir Plus</button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <section class="parallax-2">

            </section>

            <section class="best-seller">
                <h1>Vos derniers avis !!</h1>
                <div class="container">
                    <?php foreach($caroussel2 as $item){?>
                        <div class="card">
                            <h2 class='title'><?php echo $item['date'];?></h2>
                            <div class="bar">
                                <div class="emptybar"></div>
                                <div class="filledbar"></div>
                            </div>
                            <div class="circle">
                                <h3 class='title'><?php echo $item['text'];?></h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <section class="promess">
                <article>
                    <img src="https://img.icons8.com/ios-filled/100/000000/delivery--v1.png"/>
                    <h3>Livraison rapide</h3>
                </article>
                <article>
                    <img src="https://img.icons8.com/ios-filled/100/000000/satisfaction.png"/>
                    <h3>Satisfaction client</h3>
                </article>
                <article>
                    <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/100/000000/external-flash-photography-kiranshastry-solid-kiranshastry.png"/>
                    <h3>Creation Rapide</h3>
                </article>
                <article>
                    <img src="https://img.icons8.com/ios-filled/100/000000/communication.png"/>
                    <h3>Communication facile</h3>
                </article>
            </section>
        </main>
        <?php require("view/footer_index.php");?>
    </body>
</html>
