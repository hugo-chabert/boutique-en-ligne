<?php

require_once(__DIR__ . '/../model/Comment_model.php');
require_once(__DIR__ . '/../controller/Comment.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Security.php');

session_start();

if(Security::isConnect()){
    if(isset($_POST["send"]) && $_POST["text"] != NULL){
        Comment_model::write_advice($_POST['text'], $_POST['why'], $_SESSION['user']['id']);
    }
}
else{
    if(isset($_POST['send']) && $_POST['text'] != NULL && $_POST['firstname'] != NULL && $_POST['lastname'] != NULL && $_POST['email'] != NULL){
        Comment_model::write_advice_noid($_POST['text'], $_POST['why'], $_POST['firstname'], $_POST['lastname'], $_POST['email']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/root&font.css">
    <link rel="stylesheet" href="../public/css/contact.css">
    <script src="https://kit.fontawesome.com/5c3f85c4e5.js" crossorigin="anonymous"></script>
    <title>Nous contactez- Takahiro Arts</title>
</head>
<body>
    <?php require("header.php")?>
    <main role="main">
        <section class="contact">
            <article class="content-ctc">
                <h2>Contactez-nous</h2>
                <p>Si vous avez une suggestion ou tout autre envie.</p>
            </article>
            <article class="contain-ctc">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon-ctc">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="txt-ctc">
                            <h3>Adresse</h3 >
                            <p>8 Rue d'hozier, 13002 Marseille</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon-ctc">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="txt-ctc">
                            <h3>Email</h3 >
                            <p>takahiro__arts@gmail.com</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon-ctc">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="txt-ctc">
                            <h3>Téléphone</h3 >
                            <p>07.69.02.23.00</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form action="" method="post">
                        <h2>Envoyer un message</h2>
                        <?php if(!Security::isConnect()){
                        ?>
                        <div class="inputBox">
                            <input type="text" name="firstname" required="required">
                            <span>Nom</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="lastname" required="required">
                            <span>Prénom</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <?php }?>
                        <div class="inputBox">
                            <select name="why">
                                <option value="">-Selectionner un motif-</option>
                                <option value="advice">-Avis-</option>
                                <option value="delivery">-Livraison-</option>
                                <option value="service">-Service-</option>
                                <option value="quality">-Qualité-</option>
                                <option value="satisfaction">-Satisfaction-</option>
                                <option value="other">-Autre-</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <textarea required="required" name="text"></textarea>
                            <span>Votre message</span>
                        </div>
                        <div class="inputBox">
                            <button type="submit" name="send"> Envoyer </button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
    </main>
    <?php require("footer.php")?>
</body>
</html>