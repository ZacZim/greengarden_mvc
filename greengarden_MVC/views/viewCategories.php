<main>

    <form method="POST" class="mb-3">
        <label for="categorie">Filtrer par catégorie :</label>
        <select name="categorie" id="categorie" class="form-select">
            <option value="0">Toutes les catégories</option>
            <?php

            $categories = $dao->getResults("SELECT * FROM t_d_categorie");

            foreach ($categories as $categorie) {
                echo '<option value="' . $categorie['Id_Categorie'] . '">' . $categorie['Libelle'] . '</option>';
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>


    <section class="container d-flex flex-row flex-wrap">
        <?php
        // Récupère les produits depuis la base de données
        $categorieFiltre = isset($_POST['categorie']) ? $_POST['categorie'] : 0; // 0 signifie "Toutes les catégories"

        if ($categorieFiltre == 0) {
            $products = $dao->getProduct();
        } else {
            $query = "SELECT * FROM t_d_produit WHERE Id_Categorie = $categorieFiltre";
            $products = $dao->getResults($query);
        }

        // Affiche les produits en utilisant la fonction générique
        foreach ($products as $product) {
            $dao->autoCard($product);
        }
        ?>
    </section>
</main>