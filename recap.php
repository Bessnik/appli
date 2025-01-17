<?php
    session_start(); // Démarrer la session 

    // var_dump($_SESSION['products']);
    // var_dump($text);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Barre de navigation  -->
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Récapitulatif</a></li>
        </ul>
    </nav>

    <a href="traitement.php?action=clear">Effacer panier</a>
    
     

    
    <?php 
        // var_dump($_SESSION); 
        // Si la session ne contient aucun produit, afficher le message.
        if(!isset($_SESSION['products']) || empty ($_SESSION['products'])){     //!isset() verifier la clé "products" si existe. empty() verifier si variable est vide au pas.
            echo "<p>Aucun produit en session...</p>";
        }
        else{ // Si les produits existent, créer un tableau.
            echo "<table>", // la table
                    "<thead>",// en tête de table
                        "<tr>",// ligne de tableau
                            "<th>#</th>", // Numéro d'ordre
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",  // Total pour le produit (prix * quantité)
                        "</tr>",
                    "</thead>",
                    "<tbody>";
        $totalGeneral = 0;  // Initialisation du total général 
        foreach ($_SESSION['products'] as $index => $product){  // une manière de parcourir tous les éléments d'un tableau stocké dans la session.
                echo    "<tr>",
                            "<td>".$index."</td>", //index de produit 
                            "<td>".$product['name']."</td>", //nom du produit
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // prix de produit formaté avec deux decimales, le virgule et l'espace, affichage de € aussi
                            "<td>".$product['qtt']."</td>",// quantité de produit
                            "<td>".number_format($product['qtt']*$product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            // "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",  // total de produit formaté avec deux decimales, le virgule et l'espace, affichage de € aussi     
                            '<td><a href="traitement.php?action=up-qtt&id='.$index.'">+</a>.</td>',
                            '<td><a href="traitement.php?action=down-qtt&id='.$index.'">-</a>.</td>',
                            '<td><a href="traitement.php?action=delete&id='. $index.'">Suprimer</a>.</td>',
                                          
                        "</tr>";
                $totalGeneral += $product['total']*$product['qtt']; // Ajouter le total de produit au total général.
            }
            echo    
                    "<tfoot>",
                        "<tr>",
                            "<td colspan=4>Total général : </td>", // Fusionner 4 colonnes
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>", //total géneral avec du texte en gras
                        "</tr>",
                    "</tfoot>",
                "</tbody>",
            "</table>";
        
        }
    
    
    ?>
</body>
</html>