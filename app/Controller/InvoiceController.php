<?php 

namespace App\Controller;

class InvoiceController{

    public function __construct(
        public OrderController $order,
    ){ }
    public function index(){
        echo "hello from invoice controller";
    }
}