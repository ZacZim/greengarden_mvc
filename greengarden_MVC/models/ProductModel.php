<?php

require_once 'DAOModel.php';


class Product extends DAOModel
{

    public function getProducts()
    {
        $sql = "SELECT * FROM t_d_produit";
        $products=$this->getResults($sql);
        return $products;
    }

    public function getProductsByCategory($idcat)
    {
        $sql = "SELECT * FROM t_d_produit WHERE Id_Categorie =" .$idcat;
        $products=$this->getResults($sql);
        return $products;
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
        $query = $this->connexion()->prepare($sql);
        $query->execute($param);
    }
}
