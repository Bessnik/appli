<?php
    session_start();
    // limiter l'accès à traitement.php

    //filter input permet d'effectuer une validation ou un nettoyage de chaque donnée transmise
    if(isset($_POST['submit'])){ 
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); //FILTER_SANITIZE_STRING: ce filtre supprime une chaîne de caractères de toute présence de caractères spéciaux
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_VALIDATE_FLOAT validera le prix que s'il est un nombre à virgule. FILTER_FLAG_ALLOW_FRACTION est ajouté pour permettre l'utilisation du caractére "," ou"." pour la décimale.
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); //FILTER_VALIDATE_INT ne validera la quantité que si celle_ci est un nombre entier différent de zéro

        if($name && $price && $qtt){

            $product = [                //tableau associatif $product
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION['products'][] = $product; //enregistrer le $product en session

        }
    }

    header("Location:index.php"); //redirection grâce à la fonction header()
