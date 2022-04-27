<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/story.css">
    <link rel="stylesheet" href="../public/css/root&font.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Qui sommes-nous ?</title>
</head>
<body>
    <?php require("header.php")?>
    <main>
        <div class="container">
            <section class="header">
                <a href="#history"><h1>Le Monde de Takahiro Arts</h1></a>
            </section>

            <section class ="section-pres" id="history">
                <h2 >Qui est Takahiro Arts ?</h2>
                <p>
                    Takahiro est un prénom issu du japonais (taka) "de valeur, noble" ou (taka)
                    "piété filiale" combiné avec (hiro) "grand, grand(super)" ou (hiro) "prospère".
                    Le choix de ce pseudo à son importance dans le sens ou, c'est une bonne
                    représentation de la grandeur et de la prospérité de par son éthymologie.
                    <br><br>
                    Passionné depuis tout petit par le monde japonais et l'art en général, le meilleur
                    moyen de combiné ces deux mondes et de se tourner vers les mangas. Dessiné un
                    personnage demande beaucoup de travail, il faut le maquetter, penser au chara-design
                    , proposer plusieur design au personnage et une multitude d'autre paramètres.
                    Voila d'où est né cette passion, le sens du détails nous pousse à créer chez Takahiro
                    Arts des oeuvres uniques et travaillées au maximum.
                    <br><br>
                    Créé en Juin 2020, nous vendons nos oeuvres en suivant vos exigences les plus folles.
                    Nous vous proposons une multitude de création pour satisfaire vos yeux, vous êtes
                    un fan, d'art, d'anime, de manga et de la culture Japonaise ? Eh bien n'attendais
                    plus commander directement des oeuvres uniques issus de vos manga/animé préférés.
                    Pour cela remplissez votre panier via <a href="store.php">notre boutique</a> pour
                    voir l'étendu de notre savoir faire.
                </p>
            </section>

            <div class="parallax">
                <div class="blur"></div>
            </div>

            <section class="section-real">
                <h2>Qu'est ce que nous proposons ?</h2>
                <div class="bloc-real">

                    <div class="card">
                        <div class="imgBx">
                            <img src="../public/img/blacky.PNG">
                        </div>
                        <div class="contentBx">
                            <div class="content">
                                <h3>Portrait</h3>
                                <p>
                                    Basé sur une photo de vous, nous reproduirons le plus
                                    fidelement possible vos traits physiques
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="imgBx">
                            <img src="../public/img/portrait-dbz.PNG">
                        </div>
                        <div class="contentBx">
                            <div class="content">
                                <h3>Portrait Custom</h3>
                                <p>
                                    Dans le style de l'animé de votre choix, nous
                                    réaliserons un protrait de vous dans l'univers
                                    manga de votre choix.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="imgBx">
                            <img src="../public/img/custom shoes.png">
                        </div>
                        <div class="contentBx">
                            <div class="content">
                                <h3>Custom Shoes</h3>
                                <p>
                                    Nous personnaliserons vos paires de chaussures
                                    préférées pour en faire des pièces uniques et
                                    de bonnes qualités.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="imgBx">
                            <img src="../public/img/logo-esport.PNG">
                        </div>
                        <div class="contentBx">
                            <div class="content">
                                <h3>Logo</h3>
                                <p>
                                    Nous créons aussi des logos pour entreprise, e-sport,
                                    marque de vetement et autres exemples.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="imgBx">
                            <img src="../public/img/SNK.PNG">
                        </div>
                        <div class="contentBx">
                            <div class="content">
                                <h3>Poster</h3>
                                <p>
                                    Nous dessinerons des poster que par la suite nous
                                    encadrerons pour vous permettre d'orner votre intèrieur
                                    avec vos animés préférés.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
    <?php require("footer.php")?>
</body>
<script>
    AOS.init();
</script>
</html>