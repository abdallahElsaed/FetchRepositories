<?php

use App\Controller\ApiController;
use Routes\Router;
// autoload 
require __DIR__ . '/../vendor/autoload.php';
define("RESOURCE_PATH", __DIR__ . "/../view/");

$route = new Router();

$route
        ->register("/githup_repo/public/index.php",[ApiController::class,"index"])
        ->register("/githup_repo/public/index.php/api-result",[ApiController::class,"apiResult"]);

echo $route->resolve($_SERVER['REQUEST_URI']) ;
