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
                <h1><?php echo $_SESSION['user']['login'];?></h1>
                <hr>
                <nav>
                    <ul>
                        <li> <a href="profile_info.php">Informations Personnelles</a></li>
                        <li> <a href="my_orders.php">Mes Commandes</a></li>
                        <li> <a href="cart.php">Mon Panier</a></li>
                        <li> <a href="my_opinions.php">Mes Avis</a></li>
                        <?php
                        if ($_SESSION['user']['rights']==1){?>
                            <li> <a href="admin-item.php">Ajout d'articles</a> </li>
                            <li> <a href= admin-user.php>Gestion des utilisateurs</a> </li>
                            <li> <a href= admin-modify-user.php>Gestion des Commentaires</a> </li>
                        <?php } ?>
                    </ul>
                </nav>
            </section>

            <section class="profile-pres">
                <img src="../public/img/Card.PNG" alt="Logo Takahiro Art">
                <p>
                    Bienvenue dans votre compte Takahiro Art,
                    <br><br>
                    Dans cet espace vous pourrez suivre vos commandes,<br>
                    gérer vos informations personnelles, vos abonnements <br>
                    et consulter vos offres en cours.
                </p>
                <article>
                    <p>
                        Découvrez la carte de membre de la Takahiro Community.
                        Pour seulement 14.99€/mois, vous beneficierez d'une multitude
                        de réduction et en prime 2 à 3 posters offerts cahque année.
                        N'attendez plus et rejoignez la Takahiro Family.
                    </p>
                    <div class="div-button">
                        <button>Bientot disponible</button>
                        <a href="contact.php"><button> Suggestions ?</button></a>
                    </div>
                </article>
            </section>

        </main>
        <?php require('footer.php') ?>
    </body>
</html>