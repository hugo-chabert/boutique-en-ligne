<link rel="stylesheet" href="../public/css/side_nav.css">
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
                <li> <a href="admin-item-delete.php">Suppression d'articles</a> </li>
                <li> <a href= admin-user.php>Gestion des Utilisateurs</a> </li>
                <li> <a href= admin-modify-user.php>Gestion des Commentaires</a> </li>
            <?php } ?>
        </ul>
    </nav>
</section>