<?php
require_once 'controllers/AdminController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/RegisterController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/ProductController.php';
require_once 'views/view.php';

class Router
{
    private $controllerAdmin;
    private $controllerCategory;
    private $controllerProduct;
    private $controllerLogin;
    private $controllerRegister;

    public function __construct()
    {
        $this->controllerAdmin = new ControllerAdmin();
        $this->controllerCategory = new ControllerCategory();
        $this->controllerProduct = new ControllerProduct();
        $this->controllerLogin = new ControllerLogin();
        $this->controllerRegister = new ControllerRegister();
    }

    // A AJOUTER dans form de viewProducts: action="productcat()"
    // + reretourer avec $this->controllerProduct->productsbycat($id); ???

    public function routerRequete()
    {
        if (isset($_SESSION['pseudo'])) {
            if ($_SESSION['user_type'] == 2) {
                // à modifier pour la page admin plus tard
                $this->controllerProduct->products();
            } else {
                $this->controllerProduct->products();
            }
        } else {
            switch ($_GET['action']) {
                default:
                    $this->controllerLogin->login();
                    break;

                case "login":
                    $this->controllerLogin->login();
                    break;

                case "inscription":
                    $this->controllerRegister->register();
                    break;
            }
        }
    }

    // ANCIN ROUTEUR
    // public function routerRequeteOLD()
    // {
    //     switch (isset($_GET['action'])) {
    //         case "produit":
    //             if (isset($_SESSION['pseudo'])) {
    //                 $this->controllerProduct->products();
    //             } else {
    //                 $this->controllerLogin->login();
    //             }
    //             break;

    //         case "admin":
    //             if (isset($_SESSION['pseudo']) && $_SESSION['user_type'] == 2) {
    //                 // $this->controllerAdmin->admin();
    //             } else {
    //                 $this->controllerProduct->products();
    //             }
    //             break;

    //         case "inscription":
    //             $this->controllerRegister->register();
    //             break;

    //         default:
    //             $this->controllerLogin->login();
    //             break;
    //     }
    // }
}
