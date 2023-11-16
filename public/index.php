<?php

use App\Core\App;
use App\Container;
use Routes\Router;
use App\Controller\ApiController;
use App\Controller\HomeController;
use App\Controller\OrderController;
use App\Controller\InvoiceController;

// autoload 
require __DIR__ . '/../vendor/autoload.php';
define("RESOURCE_PATH", __DIR__ . "/../view/");
define("CONFIG_PATH", __DIR__ . "/../app/config/");
define("APP_URL",  "/githup_repo/public/index.php");

##################################################
$route = new Router();

$route
        ->register(APP_URL,[ApiController::class,"index"])
        ->register( APP_URL . "/api-result",[ApiController::class,"apiResult"])
        ->register( APP_URL . "/home",[HomeController::class,"index"]);

###################################################
(new App($route))->run();

