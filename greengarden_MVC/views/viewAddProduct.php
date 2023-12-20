<section>
    <div class="mb-3">
        <h3>Ajouter un nouveau produit</h3>
        <form method="POST">
            <div class="mb-3">
                <input type="number" step="0.01" class="form-control" id="tauxtva" name="tauxtva" placeholder="Taux de TVA" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="nomlong" name="nomlong" placeholder="Nom long" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="nomcourt" name="nomcourt" placeholder="Nom court" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="refproduit" name="refproduit" placeholder="Référence fournisseur" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="image" name="image" placeholder="lien HTTPS image" required>
            </div>

            <div class="mb-3">
                <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="Prix du produit" required>
            </div>

            <div class="mb-3">
                <label for="fournisseur" class="form-label">Fournisseur</label>
                <select class="form-select" id="fournisseur" name="fournisseur" required>

                    <?php
                    // Récupérer les fournisseurs depuis la base de données
                    $fournisseurs = $dao->getResults("SELECT * FROM t_d_fournisseur");

                    // Afficher les fournisseurs dans la liste déroulante
                    foreach ($fournisseurs as $fournisseur) {
                        echo '<option value="' . $fournisseur['Id_Fournisseur'] . '">' . $fournisseur['Nom_Fournisseur'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select class="form-select" id="categorie" name="categorie" required>
                    <?php
                    // Récupérer les catégories depuis la base de données
                    $categories = $dao->getResults("SELECT * FROM t_d_categorie");

                    // Afficher les catégories dans la liste déroulante
                    foreach ($categories as $categorie) {
                        $selected = ($categorie['Id_Categorie'] == $selectedCategoryId) ? 'selected' : '';
                        echo '<option value="' . $categorie['Id_Categorie'] . '" ' . $selected . '>' . $categorie['Libelle'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn bg-danger" name="btn-add-product">Ajouter</button>
        </form>
    </div>
</section>