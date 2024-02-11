<?php 
    require ('function.php'); // Je require ma page function.php
    session_start(); // Je démarre la session
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ****************** BOOTSTRAP ****************** -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- ****************************************************** -->

    <title>Recap panier</title>
</head>

<body>
    <div class="container"> <!-- Je crée le container -->

                    <!-- NAVBAR -->
        <nav class="nav nav-pills d-flex justify-content-center ju mt-3">

            <a class="nav-link bg-light" href="index.php">Ajouter produit</a>

            <a class="nav-link position-relative active" href="recap.php">
                Panier 
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                    <?php echo pastillePanier() ?> <!-- Function pour afficher le nombre d'article dans le panier -->
                    
                </span>
            </a>

        </nav>

        <div class="d-flex flex-column align-items-center m-5">

            <h1 class="text-primary mb-3">Votre panier de produit</h1>

            <?php 

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) { // Si ma session [product] est vide, alors j'affiche aucun produit.
                echo "<p>Aucun produit en session...</p>";
            } 
            else { // Sinon, je crée un tableau avec les éléments dedans
                echo "<table class='table table-striped w-50 text-center'>",
                        "<thead>",
                            "<tr>",
                                "<th scope='col'>ID</th>",
                                "<th scope='col'> Nom </th>",
                                "<th scope='col'> Prix </th>",
                                "<th scope='col'> Quantité </th>",
                                "<th scope='col'> Total </th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";

                $totalGeneral = 0; // Un total général pour le prix total

                foreach($_SESSION['products'] as $index => $product) { // Je crée un forEach pour afficher mes [product] un par un dans mon tableau
                    echo "<tr>",
                            "<td score='row'>" .  $index+1 . "</td>",
                            "<td>" . $product['name'] . "</td>",
                            "<td>" . number_format($product['price'], 2, ",", "&nbsp;"). "&nbsp;€</td>",

                            "<td>   <a href='traitement.php?action=down-qtt&id=" . $index ."' class='text-decoration-none'> - </a>"
                                         . $product['qtt'] . 
                                    "<a href='traitement.php?action=up-qtt&id=" . $index ."' class='text-decoration-none'> + </a></td>",

                            "<td>" . number_format($product['total'], 2, ",", "&nbsp;"). "&nbsp;€</td>",
                            "<td><a href='traitement.php?action=del&id=" . $index . "'><i class='bi bi-trash pe-auto'></i></a></td>",
                            "</tr>";
                        $totalGeneral += $product['total'];
                }
                echo "<tr>",
                        "<td colspan=4><strong> Total général : </strong></td>",
                        "<td><strong>". number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "<td><a href='traitement.php?action=clear'><i class='bi bi-trash pe-auto'></i></a></td>",
                        "</tr>",
                        "</tbody> </table>";
            }
            ?>

        </div>

        <?php echo deleteProduct() ?> <!-- Function message succès/alerte à la suppression d'un élément. -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!-- BOOTSTRAP <3 -->

</body>

</html>