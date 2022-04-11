<?php


require_once(__DIR__.'/Cart.php');
require('../vendor/autoload.php');

$cart = new Cart();
$items = $cart->display_items($_SESSION['user']['id']);
$totalPrice = 0;

foreach($items AS $i){
    $price = $i['price'] * $i['quantity'];
    $totalPrice = $totalPrice + $price;
}

$finalPrice = (float)$totalPrice;

// Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
\Stripe\Stripe::setApiKey('sk_test_51KMtQ9EUvgKRx7oZd6x51klur07bMHQiaWI6Njc6Jkx81kJ5QE0hyiyUU57fyhOpBLMqUG2hY1nCJt4ZMuHIjSec00uBGM6WFp');

// Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
$intent = \Stripe\PaymentIntent::create([
    'amount' => $price*100, // Le prix doit être transmis en centimes
    'currency' => 'eur',
]);


?>