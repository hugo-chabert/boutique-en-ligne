<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/root&font.css">
    <link rel="stylesheet" href="../public/css/panier.css">
    <title>Votre Panier - Takahiro Arts</title>
</head>
<body>
    <?php require("header.php")?>
    <main role="main">
        <div id="cart" class="cartpage">
            <div id="cartform" class="col s12">
                <div class="row cart-item">
                    <div class="table cart-list">
                        <div class="thead">
                            <div class="tr">
                                <div class="th yourcart">
                                    <div class="box">
                                        <h1>VOTRE PANIER</h1>
                                    </div>
                                </div>
                                <div class="th item">&nbsp;</div>
                                <div class="th price">Prix</div>
                                <div class="th qty">Quantité</div>
                                <div class="th sumprice">Sous Total</div>
                                <div class="th remove">Vider le panier</div>
                            </div>
                        </div>
                        <div id="card-item" class="tbody">
                            <div class="tr">
                                <div class="td image">Coque one piece</div>
                                <div class="td title">One Piece [Ace B&W] - Coque RhinoShield SolidSuit personnalisée pour iPhone 13 - Blanc</div>
                                <div class="td price ">39.99 € TTC</div>
                                <div class="td qty">0</div>
                                <div class="td sumprice">39.99 € TTC</div>
                                <div class="td remove">X</div>
                            </div>
                        </div>
                        <div id="card-item" class="tbody">
                            <div class="tr">
                                <div class="td image">Coque one piece</div>
                                <div class="td title">One Piece [Ace B&W] - Coque RhinoShield SolidSuit personnalisée pour iPhone 13 - Blanc</div>
                                <div class="td price ">39.99 € TTC</div>
                                <div class="td qty">0</div>
                                <div class="td sumprice">39.99 € TTC</div>
                                <div class="td remove">X</div>
                            </div>
                        </div>
                        <div id="card-item" class="tbody">
                            <div class="tr">
                                <div class="td image">Coque one piece</div>
                                <div class="td title">One Piece [Ace B&W] - Coque RhinoShield SolidSuit personnalisée pour iPhone 13 - Blanc</div>
                                <div class="td price ">39.99 € TTC</div>
                                <div class="td qty">0</div>
                                <div class="td sumprice">39.99 € TTC</div>
                                <div class="td remove">X</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="confirm">
                <div class="information-product">
                    <div class="else">
                        <div class="else-left">
                            <div class="left-info">
                                <ol>
                                    <ol>
                                        <li>
                                            <p>
                                            Votre panier contient au moins un produit personnalisé. Votre commande nécessitera donc
                                            <span style="text-decoration: underline; color: #ff2a00;">entre 4&nbsp;à 10&nbsp;jours ouvrés</span>
                                            de préparation avant d'être envoyée.</p>
                                        </li>
                                    </ol>
                                </ol>
                        </div>
                    </div>
                    <div class="else-right">
                                <div class="price-info">
                                    <div class="price-info-item">
                                        <p class="price-info-title">Prix</p>
                                        <h2 id="CartSubtotal" class="cart-subtotal price-info-text">69.98 € TTC</h2>
                                    </div>
                                    <div class="price-info-item price-info-shipping">
                                        <p class="price-info-title">Livraison</p>
                                        <p class="price-info-text">Gratuite</p>
                                    </div>
                                    <div class="price-info-line"></div>
                                    <div class="discount">
                                        <div class="promo">
                                            <input placeholder="Code promo" type="text" class="promo-input">
                                            <button class="promo-apply">Appliquer</button>
                                        </div>
                                    </div>
                                    <div class="price-info-item">
                                        <p class="price-info-title">Sous Total</p>
                                        <p class="price-info-text">69.98 € TTC</p>
                                    </div>
                                    <div class="else-right-buttons">
                                        <a href="/" class="else-right-btn">Voir d'autres produits</a>
                                        <a href="/" class="else-right-btn">Je commande !</a>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
            </div>
        </div>
    </main>
    <?php require("footer.php")?>
</body>
</html>