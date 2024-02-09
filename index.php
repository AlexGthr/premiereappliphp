<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <title>Ajout produit</title>
    </head>

<body>

    <div class="container">

    <nav class="nav nav-pills nav-justified mt-3">
  <a class="nav-link active" href="index.php">Ajouter produit</a>
  <a class="nav-link" href="recap.php">Panier</a>
</nav>

    <div class="d-flex flex-column align-items-center m-5">

    <h1 class="text-primary">Ajouter un produit</h1>
    <form action="traitement.php" method="post">

        <div class="form-group">
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

        <p>
            <div class="text-center">
            <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary mx-auto text-center">
            </div>
        </p>
    </form>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>