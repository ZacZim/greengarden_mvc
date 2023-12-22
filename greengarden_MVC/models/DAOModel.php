<?php

abstract  class DAOModel
{
    private $host = "db";
    private $user = "root";
    private $password = "";
    private $database = "greengarden";
    private $charset = "utf8";

    //instance courante de la connexion
    protected $bdd;

    //stockage de l'erreur éventuelle du serveur mysql
    private $error;

    public function __construct()
    {
        $this->connexion(); // Appel de la méthode connexion() lors de l'instanciation de la classe
    }

    /* méthode de connexion à la base de donnée */
    private function connexion() 
    {
        try {
            // On se connecte à MySQL
            $this->bdd = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset, $this->user, $this->password);
            return $this->bdd;
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            $this->error = 'Erreur : ' . $e->getMessage();
        }
    }

    /* méthode pour fermer la connexion à la base de données */
    private function disconnect()
    {
        $this->bdd = null;
    }


    //méthode pour récupérer les résultats d'une requête SQL
    protected function getResults($query)
    {
        $results = array();

        $stmt = $this->bdd->query($query);

        if (!$stmt) {
            $this->error = $this->bdd->errorInfo();
            return false;
        } else {
            // fetch uniquement PDO associative 
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    protected function getResultsWithParams($sql, $params = null): bool|PDOStatement
    {
        if ($params == null) {
            $resultat = $this->bdd->query($sql); // exécution directe
        } else {
            $resultat = $this->bdd->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
}
