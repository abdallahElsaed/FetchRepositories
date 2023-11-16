<?php 

namespace App\Controller;
use App\Core\App;

class HomeController{

    public function index(){
    App::$container->get(InvoiceController::class)->index();
        // echo "hello from home controller";
    }
}