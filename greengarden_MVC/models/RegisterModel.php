<?php

require_once 'DAOModel.php';

class Register extends DAOModel
{
    protected $bdd;
    private $error;

    public function getMailMdp($query)
    {
        $results = array();                             //fonction pour récupérer et parcourir les données de la BDD

        $stmt = $this->bdd->query($query);              //on exécute la requête SQL

        if (!$stmt) {                                   //si la requête ne s'exécute pas, on affiche l'erreur
            $this->error = $this->bdd->errorInfo();     //stockage de l'erreur dans la variable error
            return false;                               //on retourne false
        } else {                                        //sinon, on retourne le résultat de la requête
            // fetch uniquement PDO associative 
            return $stmt->fetch(PDO::FETCH_ASSOC);      //on retourne le résultat de la requête
        }
    }

    //fonction pour vérifier si l'email existe déjà dans la BDD:
    public function checkMail($email)
    {                                                                      //mettre en paramètre l'email stocké en POST    
        $sql = "SELECT * FROM t_d_client WHERE Mail_Client = '$email'";    //requête SQL pour sélectionner l'email dans la BDD
        return $this->getMailMdp($sql);                                    //on retourne le résultat de la requête                                  
    }

    public function checkPseudonyme($pseudonyme)
    {
        $sql = "SELECT * FROM t_d_user WHERE Login = :login";
        $query = $this->bdd->prepare($sql);
        $query->execute([":login" => $pseudonyme]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //Validation des donnes 
    function valid_donnees($donnees)                                        //on crée une fonction pour sécuriser les données du formulaire
    {
        $donnees = htmlentities(stripslashes(trim($donnees)));              //on enlève les espaces, les antislashs et les caractères spéciaux
        return $donnees;                                                    //on retourne les données sécurisées                                           
    }

    public function insertclient($param = [])
    {
        $sql = "INSERT INTO t_d_client (Nom_Societe_Client, Nom_Client, Prenom_Client, Mail_Client, Tel_Client, Id_Commercial, Id_Type_Client) VALUES (:n_s_cli, :n_cli, :p_cli, :m_cli, :t_cli, :id_c, :id_t_cli)";
        $query = $this->bdd->prepare($sql);
        $query->execute($param);
    }

    public function insertUser($param = [])
    {
        $sql = "INSERT INTO t_d_user (id_UserType, Login, Password) VALUES (:id, :log, :pass)";
        $query = $this->bdd->prepare($sql);
        $query->execute($param);
    }
}
