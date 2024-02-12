<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ****************** BOOTSTRAP ****************** -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- ****************************************************** -->

    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="container"> <!-- Je crée le container -->

                        <!-- NAVBAR -->
        <nav class="nav nav-pills d-flex justify-content-center ju mt-3">

            <a class="nav-link <?= $navBar1 ?>" href="index.php">Ajouter produit</a>

            <a class="nav-link position-relative <?= $navBar2 ?>" href="recap.php">
                Panier 
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                <?php echo pastillePanier() ?> <!-- Function pour afficher le nombre d'article dans le panier -->
        
                </span>
            </a>

        </nav>

    <?= $content ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!-- BOOTSTRAP <3 -->

</body>

</html>