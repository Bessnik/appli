<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php 
        // var_dump($_SESSION); 
        if(!isset($_SESSION['products']) || empty ($_SESSION['products'])){     //!isset() sot la clé "products" n'existe pas. empty() soit cette clé existe mais ne contient aucune donnée
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>",
            foreach ($_SESSION['products'] as $index => $product){

            }
            echo    "</tbody>",
                "</table>";
        
        }
    
    ?>
</body>
</html>