<?php 
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) { // Je vérifie qu'il y a un index et je l'enrengistre

$index = $_GET['id'];

}

if(isset($_GET['action'])) { // Si je recois une action depuis l'url

    switch($_GET['action']){ // Alors je gère les cas avec un switch :

        case "add":

            if (isset($_FILES)) { // Si j'ai une image dans le file 

            // Je filtre mes données
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $name = ucfirst($name);
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

            // Je récupère mes files
            $tmpName = $_FILES['file']['tmp_name'];
            $nameImg = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $erreur = $_FILES['file']['error'];

            // Je sépare le nom à l'extension
            $tabExtension = explode('.', $nameImg);
            // Je met le tout en minuscule
            $extension = strtolower(end($tabExtension));

            // Et j'ajoute un tableau des extensions que j'accepte
            $extensions = ['jpg', 'png', 'jpeg', 'gif', 'jfif'];
            // Ainsi qu'un poids max de l'image
            $maxSize = 400000;

        
            if($name && $price && $qtt && in_array($extension, $extensions) && $size <= $maxSize) {
            // Si tout est bon alors :
        
                // Je crée une nom unique à l'image
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension; 

                // Je crée mon tableau associatif pour la session
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price*$qtt,
                    "image" => $file
                ];

        
                //je crée l'image $file = 5f586bf96dcd38.73540086.jpg dans un dossier
                move_uploaded_file($tmpName, './upload/'.$file);

                // J'enrengistre en session mon product et un message d'erreur succès
                $_SESSION['products'][] = $product;
                $_SESSION['error'] = "<div class='alert alert-success' role='alert'>
                                    Votre produit à bien été enrengistré !
                                   </div>";
        
            } else if (isset($_POST['submit'])){ // Sinon, j'enrengistre un message d'erreur
             
                $_SESSION['error'] = "<div class='alert alert-danger' role='alert'>
                                     Erreur. Votre produit n'as pas été enrengistré !
                                   </div>";
            }

            // A la fin, je renvoi sur la page index.php.
            header("Location:index.php");
            break;

            }
        
        case "del": 
                
                    // Vérifie si l'index est valide
                    if (isset($_SESSION['products'][$index])) {

                        // Je supprime l'image de mon dossier
                        $unlinkImg = "upload/" . $_SESSION['products'][$index]['image'] . "";
                        unlink($unlinkImg);

                        unset($_SESSION['products'][$index]); // Je retire l'élément de la session

                        // Et je renvoi un message de succes
                        $_SESSION['error'] = "<div class='alert alert-success' role='alert'>
                        Votre produit à bien été supprimé.
                       </div>";

                        header("Location:recap.php"); // Je renvoi ensuite sur la page recap.php
                        break;

                    } else { // Sinon, je renvoi un message d'erreur.
                        $_SESSION['error'] = "<div class='alert alert-danger' role='alert'>
                        Erreur. Votre produit n'as pas été supprimé.
                      </div>";
                    }

        case "clear":

            foreach($_SESSION['products'] as $product) { // Je supprime toutes les images de mon dossiers
                $unlinkImg = "upload/" . $product['image'] . "";
                unlink($unlinkImg);

            }

            unset($_SESSION['products']); // Et je clean la session.


            // Petit message de succès
            $_SESSION['error'] = "<div class='alert alert-success' role='alert'>
            Vos produits ont bien été supprimés.
           </div>";

           // Et je renvoi sur la page recap.php
            header("Location:recap.php");
            break;
     
        case "down-qtt":
            $_SESSION['products'][$index]['qtt'] -= 1; // J'enlève 1 à la quantité
            // Et je recalcul le total
            $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $_SESSION['products'][$index]['price'] ;

            // Si la quantité est à 0, je supprime l'élément de la session.
            if ($_SESSION['products'][$index]['qtt'] <= 0) {
                // Je supprime l'image de mon dossier
                $unlinkImg = "upload/" . $_SESSION['products'][$index]['image'] . "";
                unlink($unlinkImg);

                unset($_SESSION['products'][$index]);

                $_SESSION['error'] = "<div class='alert alert-success' role='alert'>
                Quantité à 0. Produit supprimé.
               </div>";
            }

            // Et je renvoi sur recap.php
            header("Location:recap.php");
            break;

        case "up-qtt":
            $_SESSION['products'][$index]['qtt'] += 1; // J'ajoute 1 à la quantité
            // et je recalcul le total
            $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $_SESSION['products'][$index]['price'];

            // Et je renvoi sur recap.php
            header("Location:recap.php");
            break;
    }

}