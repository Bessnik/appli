<?php
    session_start();
    
    // Voir si le formulaire a été soumis
    //filter_input permet d'effectuer une validation ou un nettoyage de chaque donnée transmise
    // $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //FILTER_SANITIZE_FULL_SPECIAL_CHARS: ce filtre supprime une chaîne de caractères de toute présence de caractères spéciaux
    // $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //FILTER_VALIDATE_FLOAT Valide le prix comme un nombre flottant FILTER_FLAG_ALLOW_FRACTION permet les virgules ou les points pour les décimales.
    // $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); //FILTER_VALIDATE_INT ne validera la quantité que si celle_ci est un nombre entier différent de zéro. Pour impecher d'ajout les nombre negativ, on peut utiliser cette option ['options' => ['min_range' => 0 ]]
    
    
    
    if(isset($_GET['action'])){
        
        switch($_GET['action']){
            case "add": 
                if(isset($_POST['submit'])){ 
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); 
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);


                    if($name && $price && $qtt){ //si les trois champs sont valides

                        $product = [  
                            //tableau associatif représent de produit
                            
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION['products'][] = $product; //enregistrer le $product en session
                        

                        // $_SESSION['message'] = "Produit ajouter avec succes";
            
                    }
                }
                break;

                case "delete": 
                    
                    unset($_SESSION["products"][$_GET['id']]);
                    break;
                case "clear": 
                    unset($_SESSION["products"]);                  
                break;
                    // trouver comment on supprime tous les elements en session 
                case "up-qtt":
                    $_SESSION["products"][$_GET['id']]["qtt"]++;
                break;
                
                case "down-qtt": 
                    $_SESSION["products"][$_GET['id']]["qtt"]--; 
                break;          
            }
        }

        // if($name && $price && $qtt){
        //     $_SESSION['products'][] = $product;
        //     $_SESSION['message'] = "Produit ajouter avec succes";
        // }

    



    header("Location:index.php"); //redirection de la page vers index.php grâce à la fonction header()

