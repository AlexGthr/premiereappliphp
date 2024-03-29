<?php 
    require ('function.php'); // Je require ma page function.php
    session_start(); // Je démarre la session
    ob_start();
?>

        <div class="d-flex flex-column align-items-center m-5">

            <h1 class="text-primary mb-3">Votre panier de produit</h1>

            <?php 

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) { // Si ma session [product] est vide, alors j'affiche aucun produit.
                echo "<p>Aucun produit en session...</p>";
            } 
            else { // Sinon, je crée un tableau avec les éléments dedans
                echo "<table class='table table-striped w-50 text-center align-middle'>",
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

                            "<td><button class='btn btn-light' data-bs-toggle='modal' data-bs-target='#staticBackdrop" . $index . "'>

                            <img src='upload/" . $product['image'] . "'class='img-thumbnail'></button>
                            </td>
                            <div class='modal fade' id='staticBackdrop". $index ."' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                              <div class='modal-dialog modal-xl'>
                                <div class='modal-content'>
                                  <div class='modal-header'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Image</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                  </div>
                                  <div class='modal-body'>
                                  <img src='upload/" . $product['image'] ."' width='1100px' height='800px'/>
                                  </div>
                                    <div class='modal-footer'>
                                       <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                   </div>
                                  </div>
                               </div>
                            </div>",



                            "<td>" . number_format($product['price'], 2, ",", "&nbsp;"). "&nbsp;€</td>",
                            
                            "<td>   <a href='traitement.php?action=down-qtt&id=" . $index ."' class='text-decoration-none'> - </a>"
                            . $product['qtt'] . 
                            "<a href='traitement.php?action=up-qtt&id=" . $index ."' class='text-decoration-none'> + </a></td>",

                            "<td>" . number_format($product['total'], 2, ",", "&nbsp;"). "&nbsp;€</td>",
                            "<td><a href='traitement.php?action=del&id=" . $index . "'><i class='bi bi-trash pe-auto'></i></a></td>",
                            "</tr>";

                        $totalGeneral += $product['total']; // Je rajoute ici le total de tout les produits
                }
                echo "<tr>",
                        "<td colspan=4><strong> Total général : </strong></td>",
                        "<td><strong>". number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "<td>
                        
                        <a type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                            <i class='bi bi-trash pe-auto'></i></a>
                            </td>",

                        "</tr>",
                        "</tbody> </table>";
            }
            ?>

        </div>

        <?php

        $title = "Recap panier";
        $navBar2 = "active";
        $navBar1 = "bg-light";
        $content = ob_get_clean();

        require_once "template.php"; ?>