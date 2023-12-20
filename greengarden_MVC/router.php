<?php
require_once 'controllers/LoginController.php';
require_once 'controllers/RegisterController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/ProductController.php';
require_once 'views/view.php';

class Router
{
    private $controllerCategory;
    private $controllerProduct;
    private $controllerLogin;
    private $controllerRegister;

    public function __construct()
    {
        $this->controllerCategory = new ControllerCategory();
        $this->controllerProduct = new ControllerProduct();
        $this->controllerLogin = new ControllerLogin();
        $this->controllerRegister = new ControllerRegister();
    }

    public function routerRequete()
    {
        switch (isset($_GET['action'])) {
            case "inscription":
                $this->controllerRegister->register();
                break;

            case "produit":
                $this->controllerProduct->products();
                break;
            
            case "admin":
                break;

            


            default:
                $this->controllerLogin->login();
                break;
        }
    }
}
