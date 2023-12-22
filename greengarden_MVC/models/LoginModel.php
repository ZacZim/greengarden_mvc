<?php

require_once 'DAOModel.php';

class Login extends DAOModel
{
    protected $bdd;
    private $error;

    public function getLogin($query)
    {
        $results = array();                             //fonction pour récupérer et parcourir les données de la bdd 

        $stmt = $this->getResults($query);              //on exécute la requête SQL

        if (!$stmt) {                                   //si la requête ne s'exécute pas, on affiche l'erreur
            // $this->error = $this->errorInfo();       //stockage de l'erreur dans la variable error
            return false;                               //on retourne false
        } else {                                        //sinon, on retourne le résultat de la requête
            
        return $stmt;                                   //on retourne le résultat de la requête
        }
    }

    public function checkLogin($Pseudonyme)
    {
        $sql = "SELECT * FROM t_d_user WHERE `Login` = '$Pseudonyme' ";
        return $this->getLogin($sql);
    }

}