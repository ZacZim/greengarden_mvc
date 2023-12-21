<?php

require_once 'DAOModel.php';


class Category extends DAOModel
{
    public function selectCategorie()
    {
        $sql = "SELECT * FROM t_d_categorie";
        $categories = $this->getResults($sql);
        return $categories;
    }
    
}