<?php
require_once './models/ProductModel.php';
require_once './views/view.php';

class ControllerProduct
{
    private $product;
  
    public function __construct()
    {
        $this->product = new Product();
    }
    

     // Affiche les détails sur un billet
     public function products()
     {
         $product = $this->product->getProducts();
        
         $vue = new View("Products");
         $vue->generer(array('product' => $product));
     }


}
