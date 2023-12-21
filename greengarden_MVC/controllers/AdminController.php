<?php
require_once './models/AdminModel.php';
require_once './views/view.php';

class ControllerAdmin
{
    private $admin;
  
    public function __construct()
    {
        $this->admin = new Admin();
    }
    
    

}
