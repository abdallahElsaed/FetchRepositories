<?php


use App\Core\App;
use App\Core\Router;
use App\Controller\ApiController;
use App\Controller\HomeController;
use App\Controller\OrderController;
use App\Controller\InvoiceController;
use App\Core\Container;

// autoload 
require __DIR__ . '/../vendor/autoload.php';
define("RESOURCE_PATH", __DIR__ . "/../view/");
define("CONFIG_PATH", __DIR__ . "/../app/config/");
define("APP_URL",  "/githup_repo/public/index.php");

##################################################
$container = new Container();
$route = new Router($container);

$route
        ->register(APP_URL,[ApiController::class,"index"])
        ->register( APP_URL . "/api-result",[ApiController::class,"apiResult"])
        ->register( APP_URL . "/home",[HomeController::class,"index"]);

###################################################
(new App($route))->run();

