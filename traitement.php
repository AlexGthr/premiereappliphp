<?php 
session_start();

if(isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $name = ucfirst($name);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if($name && $price && $qtt) {
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt
        ];

        $_SESSION['products'][] = $product;
    }

}

if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $index = $_GET['supprimer'];

    // Vérifie si l'index est valide
    if (isset($_SESSION['products'][$index])) {
        unset($_SESSION['products'][$index]);
        header("Location:recap.php");
        die();
    }
}

header("Location:index.php");