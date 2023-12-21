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
    
    // Affiche les détails sur un billet
    public function products()
    {
        $products = $this->product->getProducts();
        $categories = $this->categorie->selectCategorie();

        $vue = new View("Products");
        $vue->generer(array('products' => $products, 'categories' => $categories));
    }


       // Affiche les détails sur un billet
       public function productsbycat($id)
       {
           $products = $this->product->getProductsByCategory($id);
           $categories = $this->categorie->selectCategorie();
        
   
           $vue = new View("Products");
           $vue->generer(array('products' => $products, 'categories' => $categories));
       }

}