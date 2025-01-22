<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produitt</title>
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
    
    <h1>Ajouter un produit</h1>
    <!-- Formulaire pour l'enregistrement des produits. -->
    <form action="traitement.php?action=add" method="post">
        <p>
            <!-- Champ pour saisir le nom du produit -->
            <label>
                Nom du produit :
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <!-- Champ pour saisir le prix du produit avec possibilité d'ajouter les nombres avec different valeur(step="any")-->
            <label>
                Prix du produit :
                <input type="text" step="any" name="price">
            </label>
        </p>
        <p>
            <!-- Champ pour saisir le quantité du produit avec le valeur par defaut 1-->
            <label>
                Quantité désirée :
                <input type="text" name="qtt" value="1">
            </label>
        </p>

        <!-- Bouton d'ajout le produit -->
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>  
    </form>

    <!-- message -->
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p class='notification'>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    

    // Rediraction
    // if ($_GET['action'] === "add" || $_GET['action'] === "clear") {
    //     header("Location: index.php");
    // } else {
    //     header("Location: recap.php");
    // }
    // exit();

    ?>


</body>
</html>