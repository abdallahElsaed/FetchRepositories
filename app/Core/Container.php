<?php 

Namespace App\Core;
// use NotFoundExceptionInterface;
use Psr\Container\ContainerInterface;
use App\Exceptions\NotFoundContainerException;

class Container implements ContainerInterface {

    public array $identifiers = [];
    public function get(string $id){
        if(!$this->has($id)){
            throw new NotFoundContainerException("identifier not found");
        }
        
        $action = $this->identifiers[$id];
        // var_dump($action);
        return $action($this);
        
    }

    public function has(string $id):bool{
       return isset($this->identifiers[$id]);
    }

    public function set(string $id, callable $action){
        $this->identifiers[$id] = $action;
    }
}