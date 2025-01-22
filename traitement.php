<?php
session_start();

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "add": 
            if(isset($_POST['submit'])){ 
                // Validation des entrées
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if($name && $price && $qtt){ // Validation des champs

                    // Ajouter le produit à la session
                    $product = [  
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];

                    $_SESSION['products'][] = $product; // Enregistrer le produit dans la session
                    $_SESSION['message'] = "Produit ajouté avec succès !";
                } else {
                    $_SESSION['message'] = "Erreur : Veuillez remplir tous les champs correctement.";
                }
            }
            break;

        case "delete": 
            unset($_SESSION["products"][$_GET['id']]);
            $_SESSION['message'] = "Produit supprimé avec succès.";
            break;

        case "clear": 
            unset($_SESSION["products"]);  
            $_SESSION['message'] = "Tous les produits sont supprimés.";
            break;

        case "up-qtt":
            $_SESSION["products"][$_GET['id']]["qtt"]++;
            $_SESSION['message'] = "Quantité augmentée.";
            break;

        case "down-qtt": 
            $_SESSION["products"][$_GET['id']]["qtt"]--;
            $_SESSION['message'] = "Quantité diminuée.";            
        break;
    }
}

header("Location: recap.php"); // Rediriger vers la page récapitulative
exit();
?>
