<?php
require_once './models/CategoryModel.php';
require_once './views/category/viewCategories.php';
require_once './views/view.php';

class ControllerCategory
{
    private $category;
  
    public function __construct()
    {
        $this->category = new Category();
    }
    


}
