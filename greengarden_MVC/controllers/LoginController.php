<?php
require_once './models/LoginModel.php';
require_once './views/view.php';
class ControllerLogin
{

    private $login;

    public function __construct()
    {
        $this->login = new Login();
    }

    public function login()
    {
        $MsgErr = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['button_login'])) {

                $Pseudonyme = $_POST['pseudo'];
                $mot_de_passe = $_POST["password"];

                $loginResult = $this->login->checkLogin($Pseudonyme);
                var_dump($loginResult['Id_UserType']);

                if ($loginResult > 0) {

                    if ($Pseudonyme != $loginResult['Login']) { // Vérifie si le pseudonyme entré ne correspond pas à celui dans la base de données
                        $MsgErr = "Ce pseudonyme n'est pas valide"; // Message pour dire que le pseudonyme n'existe pas

                    } elseif (!password_verify($mot_de_passe, $loginResult['Password'])) { // Vérifie si le mot de passe lié au pseudonyme existe
                        $MsgErr = "Ce mot de passe n'est pas valide"; // Message pour dire que le mot de passe n'est pas le bon 

                    } else { // Les deux conditions sont validées 
                        $_SESSION['pseudo'] = $Pseudonyme; // On stocke le pseudonyme dans une session 
                        $_SESSION['user_type'] = $loginResult['Id_UserType'];
                        header("Location: produits.php"); // On redirige l'utilisateur vers la page "produits.php" après la connexion réussie
                        exit(); // La fonction exit() assure que le script PHP se termine ici, évitant toute exécution supplémentaire
                    }
                } else {
                    $MsgErr = "Les informations entrées ne sont pas valides";
                }
            }
        }

        $view = new View("Login");
        $view->generer(array("error" => $MsgErr));
    }
}