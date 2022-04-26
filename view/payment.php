<?php
session_start();

require_once(__DIR__ . '/../controller/Payment.php');


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../public/css/payment.css" type="text/css">
        <script type='text/javascript' src='../public/js/payment.js'></script>
        <title>Paiement</title>

    </head>
    <body>
        <main>
            <div class="container">
                <div class="wrapper">
                    <div class="outer-card">
                        <div class="price"><?php  echo " Le prix est de ".$finalPrice ."€";?></div>
                        <div class="forms">
                            <div id="card-errors" role="alert"></div>
                            <div id="card-elements" class="input-items"> </div>
                            <div id="cardholder-name" class="input-items"> <span>Name on card</span> <input placeholder="Samuel Iscon"> </div>
                            <button class="btn" id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://code.jquery.com/jquery-2.0.2.min.js"></script>
        <script src="../script.js"></script>
    </body>
</html>