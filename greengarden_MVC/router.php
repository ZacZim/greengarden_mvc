<?php
require_once 'controllers/CategoryController.php';
require_once 'controllers/ProductController.php';
require_once 'views/view.php';

class Router 
{
    private $controllerCategory;
    private $controllerProduct;

    public function __construct()
    {
        $this->controllerCategory = new ControllerCategory();
        $this->controllerProduct = new ControllerProduct();
    }

    public function routerRequete()
    {
        
    }
}