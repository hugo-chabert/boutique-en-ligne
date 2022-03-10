<link rel="stylesheet" href="../public/css/header.css">
<link rel="stylesheet" href="../public/css/root&font.css">
<header>
    <nav>
        <div class="logo">
            <a href=""><img src="../public/img/logo.PNG" width="70px"></a>
            <a href=""><h1>Takahiro Arts</h1></a>
        </div>
        <div class="menu">
            <ul class='ul-menu-1'>
                <li> <a href="../index.php">Home</a> </li>
                <li> <a href="store.php">Boutique</a> </li>
                <li> <a href="story.php">Qui sommes-nous ?</a> </li>
                <li> <a href="contact.php">Nous contacter</a> </li>
                <?php if (isset($_SESSION['user'])) { ?>
            </ul>
            <ul class="ul-menu-spe">
                <li> <a href="cart.php"><img src="https://img.icons8.com/pastel-glyph/64/000000/shopping-trolley--v2.png" width="20px"/>   Panier</a> </li>
                <li> <a href="profile.php"><img src="https://img.icons8.com/ios/50/000000/gender-neutral-user.png" width="20px"/>  <?php echo $_SESSION['user']['login'];?></a> </li>
                <li> <a href="disconnect.php"> <img src="https://img.icons8.com/material/50/000000/exit.png" width="20px"/>   Deconnexion</a> </li>
                <?php  } ?>
            </ul>
            <?php
            if (!isset($_SESSION['user'])) { ?>
                <ul class="ul-menu-2">
                    <li> <a href="connection.php">Connexion</a> </li>
                    <li> <a href="register.php">Inscription</a> </li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</header>