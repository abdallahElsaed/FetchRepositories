<?php

use App\Home;
use App\Router;
// autoload 
require __DIR__ . '/../vendor/autoload.php';

$route = new Router();

$route
        ->register("/githup_repo/public/index.php/home",[Home::class,"index"])
        ->register("/githup_repo/public/index.php/create",[Home::class,"create"]);

echo $route->resolve($_SERVER['REQUEST_URI']) ;
