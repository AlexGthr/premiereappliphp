<?php 

function addProduct() { // Message succès/erreur page Ajouter un produit

    $result = "";

    if (!isset($_SESSION['error'])) { // Si la session n'existe pas ou est null
        $result = "";
    }
    
    else if(!$_SESSION['error']) { // Si elle est false, alors tout va bien
            unset($_SESSION['error']);
            $result = "<div class='alert alert-success' role='alert'>
                   Votre produit à bien été enrengistré !
                  </div>";
    } else if ($_SESSION['error']) { // Sinon...
            unset($_SESSION['error']);
            $result = "<div class='alert alert-danger' role='alert'>
                    Erreur. Votre produit n'as pas été enrengistré !
                  </div>";
    }
      
    return $result;
}

function deleteProduct() { // Message succès/erreur page Panier

    $result = "";

    if (!isset($_SESSION['error'])) {  // Si la session n'existe pas ou est null
        $result = "";
    }
    
    else if(!$_SESSION['error']) { // Si elle est false, alors tout va bien
            unset($_SESSION['error']);
            $result = "<div class='alert alert-success' role='alert'>
                   Votre produit à bien été supprimé !
                  </div>";
    } else if ($_SESSION['error']) { // Sinon...
            unset($_SESSION['error']);
            $result = "<div class='alert alert-danger' role='alert'>
                    Erreur. Votre produit n'as pas été supprimé !
                  </div>";
    }
      
    return $result;
}

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
