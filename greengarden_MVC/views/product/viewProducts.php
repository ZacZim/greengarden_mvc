

<section class="container d-flex flex-row flex-wrap">
            <?php
          

            // Affiche les produits en utilisant la fonction générique
            foreach ($products as $product) {
                autoCard($product);
            }
            ?>
        </section>


        <?php


    //Génération des card bootsrap automatique 
     function autoCard($product)
    {
        echo '<div class="card m-3 d-flex flex-wrap justify-content-center" style="width: 18rem;">';
        echo '<img src="' . $product['Photo'] . '" class="card-img-top" alt="' . $product['Nom_court'] . '">';
        echo '<div class="card-body d-flex flex-column justify-content-center">';
        echo '<h5 class="card-title d-flex justify-content-center mt-2 ">' . $product['Nom_court'] . '</h5>';
        echo '<p class="card-text d-flex justify-content-center">' . $product['Nom_Long'] . '</p>';
        echo '<p class="card-text d-flex justify-content-center">Prix : ' . $product['Prix_Achat'] . ' €</p>';
        echo '<a href="#" class="btn btn-primary">Acheter</a>';

        // Vérification du type d'utilisateur avant d'afficher les boutons et verification de la page pour afficher ou non 
        if (isset($_SESSION['pseudo']) && $_SESSION['user_type'] == 2 && basename($_SERVER['PHP_SELF']) == 'admin.php') {
            echo '<form method="POST">';
            echo '<button type="submit" name="btn_supp" value="' . $product['Id_Produit'] . '" class="btn btn-dark details-btn" >Supprimer</button>';
            echo '<button type="submit" name="btn_modif" value="' . $product['Id_Produit'] . '" class="btn btn-warning details-btn mx-2" >Modifier</button>';
            echo '</form>';
        }
        
        echo '</div>';
        echo '</div>';
    }
?>