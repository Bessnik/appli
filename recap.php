<?php
    session_start(); // Démarrer la session
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
    <!-- Barre de navigation -->
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="recap.php">Récapitulatif</a></li>
        </ul>
    </nav>


    <?php 
        // Vérifier si la session contient des produits
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        } else {
            // Afficher le tableau des produits
            echo "<table>", // la table
                    "<thead>",// en tête de table
                        "<tr>",// ligne de tableau
                            "<th>#</th>", // Numéro d'ordre
                            "<th>Nom</th>",
                            // "<th>Prix</th>",
                            // "<th>Quantité</th>",
                            "<th>Total</th>",  // Total pour le produit (prix * quantité)
                            "<th>Ajouter un quantité</th>",
                            "<th>Suprimer un quantité</th>",
                            "<th>Suprimer le produit</th>",

                        "</tr>",
                    "</thead>",
                    "<tbody>";
                    
            $totalGeneral = 0;  // Initialisation du total général 
            foreach ($_SESSION['products'] as $index => $product){  // Parcours de tous les produits de la session
                echo    "<tr>",
                            "<td>".$index."</td>", // index du produit
                            "<td>".$product['name']."</td>", // Nom du produit
                            // "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // Prix du produit formaté
                            // "<td>".$product['qtt']."</td>", // Quantité du produit
                            "<td>".number_format($product['qtt'] * $product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>", // Total pour ce produit
                            '<td class="centre"><a class="ajouter" href="traitement.php?action=up-qtt&id='.$index.'">+</a></td>',  // Bouton pour augmenter la quantité
                            '<td class="centre2"><a class="diminuee" href="traitement.php?action=down-qtt&id='.$index.'">-</a></td>',  // Bouton pour diminuer la quantité
                            '<td class="supr"><a href="traitement.php?action=delete&id='.$index.'">Supprimer</a></td>', // Bouton pour supprimer le produit
                        "</tr>";
                        
                $totalGeneral += $product['price'] * $product['qtt'];  // Ajout du total du produit au total général
            }
            echo    
                    "<tfoot>",
                        "<tr>",
                            '<td class="total" colspan=2>Total général : </td>', // Fusionner 2 colonnes
                            '<td class="total-nr"><strong>'.number_format($totalGeneral, 2, ",", "&nbsp;").'&nbsp;€</strong></td>', // Total général
                            '<td class="clear" colspan=3><a class="clear-btn" href="traitement.php?action=clear">Effacer le panier</a></td>', // Fusionner 2 colonnes

                            
                        "</tr>",
                    "</tfoot>",
                "</tbody>",
            "</table>";
        }

        

        // Afficher le message de notification s'il existe
        if (isset($_SESSION['message'])) {
            echo "<p class='notification'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }

    ?>


</body>
</html>
