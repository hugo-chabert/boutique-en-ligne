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
            <div class="content-ctc">
                <h2>Contactez-nous</h2>
                <p>Si vous avez une suggestion ou tout autre envie.</p>
            </div>
            <div class="contain-ctc">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon-ctc">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="txt-ctc">
                            <h3>Adresse</h3 >
                            <p>292 Avenue des africains</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon-ctc">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="txt-ctc">
                            <h3>Email</h3 >
                            <p>remi.djambe@yahoo.fr</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon-ctc">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="txt-ctc">
                            <h3>Téléphone</h3 >
                            <p>06.87.75.65.75</p> 
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form>
                        <h2>Envoyer un message</h2>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Nom entier</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea required="required"></textarea>
                            <span>Votre message</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="" value="send">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php require("footer.php")?>
</body>
</html>