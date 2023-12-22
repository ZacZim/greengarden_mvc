<?php
require_once './models/CategoryModel.php';
require_once './models/ProductModel.php';
require_once './views/view.php';

class ControllerProduct
{
    private $product;
    private $categorie;
  
  
    public function __construct()
    {
        $this->product = new Product();
        $this->categorie = new Category();
   
    }
    
    public function products()
    {
        $products = $this->product->getProducts();
        $categories = $this->categorie->selectCategorie();

        $vue = new View("Products");
        $vue->generer(array('products' => $products, 'categories' => $categories));
    }

    public function productsbycat($id)
    {
        $products = $this->product->getProductsByCategory($id);
        $categories = $this->categorie->selectCategorie();
    

        $vue = new View("Products");
        $vue->generer(array('products' => $products, 'categories' => $categories));
    }
    
}