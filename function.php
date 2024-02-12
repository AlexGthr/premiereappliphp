<?php 

function pastillePanier() { // Function pastille panier
    $totalProduct = 0;

        if(!isset($_SESSION['products']) || empty($_SESSION['products'])) { // Si la session [product] n'existe pas ou est null
                echo "";
        } else {

        foreach($_SESSION['products'] as $index => $product) { // Sinon calcul le nombre de produit
                $totalProduct += $product['qtt'];
        }}
                    
        return $totalProduct; // Et renvoi le résultat
}
