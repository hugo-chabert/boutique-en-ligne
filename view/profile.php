<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/profile.css">
        <link rel="stylesheet" href="../public/css/root&font.css">
        <title>Profil</title>
    </head>
    <body>
        <?php require('header.php') ?>
        <main>

            <section class="side-nav">
                <nav>
                    <ul>
                        <li> <a href="profile_info.php">Informations Personnelles</a></li>
                        <li> <a href="my_orders.php">Mes Commandes</a></li>
                        <li> <a href="">Mon Panier</a></li>
                        <li> <a href="my_opinions.php">Mes Avis</a></li>
                    </ul>
                </nav>
            </section>

            <section class="profil-pres">
                <img src="../public/img/logo.PNG" alt="Logo Takahiro Art" width="300px">
            </section>

        </main>
        <?php require('footer.php') ?>
    </body>
</html>