<?php

namespace App\Core;

use App\Exceptions\RouteException;



class Router
{
    public function __construct(
        private Container $container
    ){

    }

    private $routes = [];
    public  function register(string $route, callable | array $action): self
    {
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve(string $routeUrl)
    {
        $routeUrl = explode("?", $routeUrl)[0];
        $action = $this->routes[$routeUrl] ?? null;


        if (!$action) {
            throw new RouteException();
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $class = $this->container->get($class);
                if (method_exists($class, $method)) {
                    return call_user_func([$class, $method], []);
                }
            }
        }

        throw new  RouteException();
    }
}
