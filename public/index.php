<?php

use App\Controller\ApiController;
use Routes\Router;
// autoload 
require __DIR__ . '/../vendor/autoload.php';
define("RESOURCE_PATH", __DIR__ . "/../view/");
define("CONFIG_PATH", __DIR__ . "/../app/config/");
define("APP_URL",  "/githup_repo/public/index.php");


$route = new Router();

$route
        ->register(APP_URL,[ApiController::class,"index"])
        ->register( APP_URL . "/api-result",[ApiController::class,"apiResult"]);

echo $route->resolve($_SERVER['REQUEST_URI']) ;
