<?php

require_once 'DAOModel.php';

class Product extends DAOModel
{
    public function getProducts($categoryId = null)
    {
        $sql = "SELECT * FROM t_d_produit";

        // Ajouter une clause WHERE si une catégorie est spécifiée
        if ($categoryId !== null) {
            $sql .= " WHERE category_id = :category_id";
        }

        $products = $this->getResults($sql);
        return $products;
    }

    public function getProductsByCategory($categorieFiltre)
    {
        $sql = "SELECT * FROM t_d_produit WHERE Id_Categorie =" . $categorieFiltre;
        $productsByID = $this->getResults($sql);
        return $productsByID;
    }

    public function getProductsById($id)
    {
        $sql = "SELECT * FROM t_d_produit WHERE Id_Produit =?";
        $products=$this->getResultsWithParams($sql,array($id));
        if ($products->rowCount() == 1)
        return $products->fetch();
    else
        throw new Exception("Aucun Produit ne correspond à l'identifiant '$id'");
    }

    public function insertProduct($param = [])
    {
        $sql = "INSERT INTO t_d_produit(Taux_TVA,Nom_Long, Nom_court, Ref_fournisseur, Photo, Prix_Achat, Id_Fournisseur, Id_Categorie) VALUES(:t_tva, :n_l, :n_c, :r_f, :p, :p_a, :id_f, :id_c)";
        $query = $this->bdd->getResultsWithParams($sql);
        $query->execute($param);
    }

    public function suppProduct($Id_Produit)
    {
        $sql = "DELETE FROM t_d_produit WHERE Id_Produit LIKE $Id_Produit";
        $this->bdd->query($sql);
    }

}