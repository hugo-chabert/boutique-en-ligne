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
        <title>Paiement</title>

    </head>
    <body>
        <?php  echo " Le prix est de ".$price ."€";?>
        <form method="post">
            <div id="errors"></div>
            <input id="cardholder-name" type="text" placeholder="Titulaire de la carte">
            <div id="card-elements" class="test"></div>
            <div id="card-errors" role="alert"></div>
            <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>
        </form>

        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://code.jquery.com/jquery-2.0.2.min.js"></script>
        <script src="../script.js"></script>
    </body>
</html>