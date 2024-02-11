<?php 
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

$index = $_GET['id'];

}

if(isset($_GET['action'])) {

    switch($_GET['action']){
        case "add":
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $name = ucfirst($name);
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        
            if($name && $price && $qtt) {
        
                $error = false;
        
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price*$qtt,
                ];
        
                $_SESSION['products'][] = $product;
                $_SESSION['error'] = $error;
        
            } else if (isset($_POST['submit'])){
                $error = true;
                $_SESSION['error'] = $error;
            }

            header("Location:index.php");
            break;
        
        case "del": 
                
                    // Vérifie si l'index est valide
                    if (isset($_SESSION['products'][$index])) {
                        unset($_SESSION['products'][$index]);

                        $error = false;
                        $_SESSION['error'] = $error;

                        header("Location:recap.php");
                        break;
                    } else {
                        $error = true;
                        $_SESSION['error'] = $error;
                    }

        case "clear":

            unset($_SESSION['products']);

            $error = false;
            $_SESSION['error'] = $error;

            header("Location:recap.php");
            break;
     
        case "down-qtt":
            $_SESSION['products'][$index]['qtt'] -= 1;
            $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $_SESSION['products'][$index]['price'] ;

            if ($_SESSION['products'][$index]['qtt'] <= 0) {
                unset($_SESSION['products'][$index]);
            }

            header("Location:recap.php");
            break;

        case "up-qtt":
            $_SESSION['products'][$index]['qtt'] += 1;
            $_SESSION['products'][$index]['total'] = $_SESSION['products'][$index]['qtt'] * $_SESSION['products'][$index]['price'];

            header("Location:recap.php");
            break;
    }




}