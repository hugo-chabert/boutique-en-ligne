<link rel="stylesheet" href="../public/css/footer.css">
<link rel="stylesheet" href="../public/css/root&font.css">
<footer>
    <div class="container-footer">
        <div class="part-up">
            <section class="about">
                <h2>About</h2>
                <p>
                Passionné de dessin depuis petit, je décide de mettre mon talent au profit du monde. <br>
                Créée en Juin 2020, Takahiro Arts propose une large gamme de produits fait main 
                essentiellement concentrés autours de l’art en général. Énormément conditionné par 
                le monde Japonais, nous réaliserons tous vos désirs artistiques. Nous vous proposons 
                plusieurs modèles de dessins allant du poster aux portraits en passant par les customs
                de chaussures. <br>
                Notre seule limite c'est vous !

                </p>
            </section>
            <section class="category">
                <h2>Navigation</h2>
                <ul>
                    <li> <a href="../index.php"> Home </a></li>
                    <li> <a href="store.php"> Boutique </a></li>
                    <li> <a href="story.php"> Qui Somme-nous ? </a></li>
                    <li> <a href="contact.php"> Nous contacter </a></li>
                </ul>
            </section>
            <section class="link">
                <h2>Utile</h2>
                <ul>
                    <li> <a href="">  </a></li>
                    <?php
                    if(!isset($_SESSION['user'])){
                    ?>
                    <li> <a href="connection.php"> Connexion </a></li>
                    <li> <a href="register.php"> Inscription </a></li>
                    <?php }
                    else{
                    ?>
                    <li> <a href="profil.php"> Profil </a></li>
                    <li> <a href="cart.php"> Panier </a></li>
                    <?php } ?>

                </ul>
            </section>
        </div>
        <hr>
        <div class="part-down">
            <section class="copy">
                <p class="copyright-text">Copyright &copy; All Rights Reserved.
            </section>
            <section class="social">
                <li><button class="facebook"><a  href="#"><img src="https://img.icons8.com/ios/30/000000/facebook--v1.png" alt="social" width="30px"></a></button></li>
                <li><button class="twitter"><a  href="#"><img src="https://img.icons8.com/ios/30/000000/twitter--v1.png" alt="social"width="30px" ></a></button></li>
                <li><button class="instagram"><a  href="https://www.instagram.com/takahiro__arts/"><img src="https://img.icons8.com/ios/30/000000/instagram-new--v1.png" alt="social"width="30px"></a></button></li>
                <li><button class="github"><a  href="https://github.com/hugo-chabert/boutique-en-ligne"><img src="https://img.icons8.com/ios-glyphs/30/000000/github.png" alt="social"width="30px"></a></button></li>
            </section>
        </div>
    </div>
</footer>