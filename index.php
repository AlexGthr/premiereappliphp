<?php 
    require ('function.php');
    session_start();
    ob_start();
?>

        <div class="d-flex flex-column align-items-center m-5">

            <h1 class="text-primary">Ajouter un produit</h1>

            <form action="traitement.php?action=add" method="post" enctype="multipart/form-data"> <!-- Formulaire pour envoyer un produit -->

                <div class="form-group ">
                    <p>
                        <label> 
                            Nom du produit :
                            <input type="text" name="name" class="form-control mx-3">
                        </label>
                    </p>
                </div>

                <div class="form-group">
                    <p>
                        <label>
                            Prix du produit en € : 
                            <input type="number" step="any" name="price" class="form-control mx-3">
                        </label>
                    </p>
                </div>

                <div class="form-group">
                    <p>
                        <label>
                            Quantité désirée :
                            <input type="number" name="qtt" value="1" class="form-control mx-3" >
                        </label>
                    </p>
                </div>

                <div class="form-group">
                    <p>
                        <label>
                            Image produit :
                            <input type="file" name="file" class="form-control mx-3" >
                        </label>
                    </p>
                </div>

                <p>
                    <div class="text-center">
                        <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary mx-auto text-center">
                    </div>
                </p>
            </form>

            <?php echo addProduct() ?> <!-- Function pour afficher message succès/erreur quand on ajoutent un produit -->
        </div>

        <?php
        
        $title = "Ajouter produit";
        $navBar1 = "active";
        $navBar2 = "bg-light";
        $content = ob_get_clean();

        require_once "template.php"; ?>
