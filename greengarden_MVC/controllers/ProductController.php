<?php
require_once './model/ProductModel.php';
require_once './views/product/viewProducts.php';
require_once './views/view.php';

class ControllerProduct
{
    private $product;
  
    public function __construct()
    {
        $this->product = new Product();
    }
    
    // Affiche les détails sur un billet
    public function product($idBillet)
    {
        $product = $this->product->getProductsById($idBillet);
       
        $vue = new View("Product");
        $vue->generer(array('product' => $product));
    }

     // Affiche les détails sur un billet
     public function products()
     {
         $product = $this->product->getProducts();
        
         $vue = new View("Product");
         $vue->generer(array('product' => $product));
     }


}
