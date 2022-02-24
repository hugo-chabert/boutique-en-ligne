
<link rel="stylesheet" href="public/css/header.css">
<link rel="stylesheet" href="public/css/root&font.css">
<header>
    <nav>
        <div class="logo">
            <a href=""><img src="public/img/logo.png" width="70px"></a>
            <a href=""><h1>Takahiro Arts</h1></a>
        </div>
        <div class="menu">
            <ul class='ul-menu-1'>
                <li> <a href="./index.php">Home</a> </li>
                <li> <a href="view/store.php">Boutique</a> </li>
                <li> <a href="view/story.php">Qui sommes-nous ?</a> </li>
                <li> <a href="view/contact.php">Nous contacter</a> </li>
                <?php if (isset($_SESSION['user'])) { ?>
            </ul>
            <ul class="ul-menu-spe">
                <li> <a href=""><img src="" alt=""></a> </li>
                <li> <a href=""><img src="" alt=""></a> </li>
                <li> <a href="view/deconnexion.php">Deconnexion</a> </li>
                <?php  } ?>
            </ul>
            <?php
            if (!isset($_SESSION['user'])) { ?>
                <ul class="ul-menu-2">
                    <li> <a href="view/connection.php">Connexion</a> </li>
                    <li> <a href="view/register.php">Inscription</a> </li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</header>