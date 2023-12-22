<form method="GET" class="mb-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="categorie">Filtrer par catégorie :</label>
    <select name="categorie" id="categorie" class="form-select">
        <option value="0">Toutes les catégories</option>
        <?php
        foreach ($categories as $categorie) {
            echo '<option value="' . $categorie['Id_Categorie'] . '">' . $categorie['Libelle'] . '</option>';
        }
        ?>
    </select>
    <button type="submit" class="btn btn-primary">Filtrer</button>
</form>

<section class="container d-flex flex-row flex-wrap">
    <?php
    // // Récupère les produits depuis la base de données
    $categorieFiltre = isset($_GET['categorie']) ? $_GET['categorie'] : 0; // 0 signifie "Toutes les catégories"
    
    // Affiche les produits en utilisant la fonction générique
    foreach ($products as $product) {
        if ($categorieFiltre == 0 || $product['Id_Categorie'] == $categorieFiltre) {
        autoCard($product);
        }
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