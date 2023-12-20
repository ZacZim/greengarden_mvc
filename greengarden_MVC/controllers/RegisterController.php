<?php
require_once './models/RegisterModel.php';
require_once './views/view.php';

class ControllerRegister
{

    private $register;

    public function __construct()
    {
        $this->register = new Register();
    }

    public function register()
    {
        $MsgErr = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST) {
                if (isset($_POST['btn_add_user'])) {
                    $nom = $_POST["nom"];
                    $prenom = $_POST["prenom"];
                    $email = $_POST["email"];
                    $tel = $_POST["tel"];
                    $Pseudonyme = $_POST['pseudo'];
                    $mot_de_passe = $_POST["password"];
                    $verif_mot_de_passe = $_POST["verif_mdp"];

                    // Hachage du mot de passe
                    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

                    // Vérification que les mots de passe correspondent
                    if ($mot_de_passe === $verif_mot_de_passe) {
                        // Vérification si l'email existe déjà dans la BDD
                        $mail = $this->register->checkMail($email);
                        if ($mail && is_array($mail) && $mail['Mail_Client'] == $email) {
                            // Si l'email existe déjà dans la BDD, on affiche un message d'erreur:
                            $MsgErr = "Cet email est déjà utilisé.";
                        } else {
                            // Vérification si le pseudonyme existe déjà
                            $existingPseudonyme = $this->register->checkPseudonyme($Pseudonyme);
                            if ($existingPseudonyme) {
                                $MsgErr = "Ce pseudonyme est déjà utilisé.";
                            } else {
                                // Appel des fonctions d'insertion
                                $userType = 1;  // Remplacez par l'ID du type client
                                $idcommercial = 3; // Remplacez par l'ID du type sans commercial 
                                $idtypeclient = 1; // Remplacez par l'ID du type Particulier 
                                // Vérification si le numéro de téléphone est renseigné
                                $tel = isset($_POST["tel"]) ? $this->register->valid_donnees($_POST["tel"]) : null;
                                $this->register->insertUser(["id" => 1, "log" => $Pseudonyme, "pass" => $hashed_password]);
                                $this->register->insertclient(["n_s_cli" => null, "n_cli" => $nom, "p_cli" => $prenom, "m_cli" => $email, "t_cli" => $tel, "id_c" => $idcommercial, "id_t_cli" => $idtypeclient]);
                                $MsgErr = "Inscription réussie !";
                            }
                        }
                    }
                }
            }
        }

        $view = new View("Register");
        $view->generer(array("error" => $MsgErr));
    }
}
