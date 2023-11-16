<?php 

namespace App\Controller;

class InvoiceController{

    public function __construct(
        public OrderController $order,
        public  ApiController $apiController,
        public  $Service,
    ){ }
    public function index(){
        $this->apiController->x();
        echo "<br>";
        $this->order->index();
        echo "<br>";
        echo "hello from invoice controller";
    }
}