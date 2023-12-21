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

    public function routerRequete()
    {
        switch (isset($_GET['action'])) {
            case "produit":
                if (isset($_SESSION['pseudo'])) {
                    $this->controllerProduct->products();
                } else {
                    $this->controllerLogin->login();
                }
                break;

            case "admin":
                if (isset($_SESSION['pseudo']) && $_SESSION['user_type'] == 2) {
                // $this->controllerAdmin->admin();
            } else {
                $this->controllerProduct->products();
            }
                break;

            case "inscription":
                $this->controllerRegister->register();
                break;

            default:
                $this->controllerLogin->login();
                break;
        }
    }






    public function routerRequeteIFELSE() {
        if (isset($_SESSION['pseudo'])) {
            if ($_SESSION['user_type'] = 2) {
                // $this->controllerAdmin->pageAdmin();
            } else {
                $this->controllerProduct->products();
            }
        } else {
            $this->controllerLogin->login();
            // $this->controllerRegister->register();
        }
    }
}
