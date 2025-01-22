<?php
session_start();

if(isset($_GET['action'])){ //isset vérifie si un paramètre existe dans l'URL.
    switch($_GET['action']){ //switch exécute différentes actions en fonction de la valeur de paramètre 'action'
        case "add": 
            if(isset($_POST['submit'])){ // $_POST est utilisée pour récupérer les données envoyées par formulaire via la méthode POST
                // Validation des entrées. La function filter_input() permet de récupérer une valeur d'entrée, 
                // INPUT_POST c'est une constante qui indique que la donnée provient de la méthode POST
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //FILTER_SANITIZE_FULL_SPECIAL_CHARS Applique un filtrage pour les caractères spéciaux
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_VALIDATE_FLOAT est un filtre utilisé pour valider qu'une valeur est un nombre à virgule flottante. FILTER_FLAG_ALLOW_FRACTION permet à la fonction de conserver le point décimal comme point(.) au virgule (,)
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); //FILTER_VALIDATE_INT est un filtre utilisé pour valider si une donnée est un nombre entier, sans le point au le decimale

                if($name && $price && $qtt){ // Validation des champs, est verifier si existe 

                    // Ajouter le produit à la session
                    $product = [  
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];

                    $_SESSION['products'][] = $product; // Ajouter les produits dans la session
                    $_SESSION['message'] = "Produit ajouté avec succès !"; // envoyer le message si le produit est ajouté
                } else {
                    $_SESSION['message'] = "Erreur : Veuillez remplir tous les champs correctement."; // le message si est ne pas bien remplir
                }
            }
            break;

        case "delete": // case de suprimé le produit
            unset($_SESSION["products"][$_GET['id']]);
            $_SESSION['message'] = "Produit supprimé avec succès.";
            break;

        case "clear": // suprimer toutes les produits
            unset($_SESSION["products"]);  
            $_SESSION['message'] = "Tous les produits sont supprimés.";
            break;

        case "up-qtt": // Augmentée le quantité par 1 en plus
            $_SESSION["products"][$_GET['id']]["qtt"]++;
            $_SESSION['message'] = "Quantité augmentée.";
            break;

        case "down-qtt": // Diminuée le quantité par 1 en moins
            $_SESSION["products"][$_GET['id']]["qtt"]--;
            $_SESSION['message'] = "Quantité diminuée.";            
        break;
    }
}

header("Location: recap.php"); // Rediriger vers la page récapitulative
exit();
?>
