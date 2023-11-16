<?php 

namespace App\Core;

use App\Controller\InvoiceController;
use App\Controller\OrderController;
use PhpParser\Node\Stmt\Static_;
use Routes\Router;

class App
{
    public static Container $container;
    
    public function __construct(protected Router $route ){

    //manually injecting container
        Static::$container =new Container ;
        Static::$container->set(InvoiceController::class, function(Container $container){
            return new InvoiceController($container->get(OrderController::class));
        }) ;
        Static::$container->set(OrderController::class, fn() => new OrderController());
    // End manually injecting container

    }

    public function run(){
        echo $this->route->resolve($_SERVER['REQUEST_URI']) ;
    }
}