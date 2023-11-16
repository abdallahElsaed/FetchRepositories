<?php 

namespace App\Controller;
use App\Core\App;
use App\Core\Container;

class HomeController{

    public function __construct(private InvoiceController $invoice){
        
    }
    public function index(){
    // autowire or automatically inject
        // $invoice= (new Container())->get(InvoiceController::class);
        $this->invoice->index();
    // (manually inject) App::$container->get(InvoiceController::class)->index();
        // echo "hello from home controller";
    }
}