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
            if (isset($_GET['action'])) {
                if ($_GET['action'] === "inscription") {
                    $this->controllerRegister->register();
                } elseif ($_GET['action'] === "login") {
                    $this->controllerLogin->login();
                }
            } else {
                $this->controllerLogin->login();
            }
        }
    }
}