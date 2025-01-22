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

    <!-- // Les superglobales sont des variables prédefinis est accessibles depuis n'importe quel fichier PHP.
    Exemples de superglobales :

    $_GET Contient les données passées dans l'URL via la méthode GET.
    $_POST  les données envoyées via un formulaire avec la méthode POST.
    $_SESSION  les données de session.
    $_COOKIE  les données des cookies.

    // Un tableau associatif est une structure de données qui permet de lier des clés à des valeurs. Par exemple, j'ai des produits comme clés ( exemple, 'pomme') et des prix comme valeurs ( exemple, 2€).


    // Une session contient des données qui sont stockées sur le cote de serveur. Si les cookies sont supprimés, ou modifier, il faut créer une nouvelle session car le serveur ne peut plus identifier l'utilisateur


    //XSS c'est le faille de sécurite par injection du code malveillante , pour protege ça on doit maitre des filtre dans la methode $_POST par ex le filtre de evites les caratcteres speciale FILTER_SANITIZE_FULL_SPECIAL_CHARS (ou FILTER_SANITIZE_STRING), ou FILTER_FLAG_ALLOW_FRACTION permet d'autoriser la présence d'un séparateur décimal comme un point . ou une virgule,  -->



</body>
</html>