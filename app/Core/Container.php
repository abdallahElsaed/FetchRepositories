<?php 

Namespace App\Core;
// use NotFoundExceptionInterface;
use Psr\Container\ContainerInterface;
use App\Exceptions\NotFoundContainerException;
use Psr\Container\ContainerExceptionInterface;

class Container implements ContainerInterface {

    public array $identifiers = [];
    public function get(string $id){

        if($this->has($id)){
            $action = $this->identifiers[$id];
            return $action($this);
        }

        return $this->resolve($id);
        
    }

    public function has(string $id):bool{
       return isset($this->identifiers[$id]);
    }

    public function set(string $id, callable $action){
        $this->identifiers[$id] = $action;
    }

    public function resolve(string $id){
        // fetch class from Reflection  class
        
        $reflectionClass= new \ReflectionClass($id);
        if(! $reflectionClass->isInstantiable()){
            throw new NotFoundContainerException("The $id class is not instantiable");
        }
        //fetch constructor 

        $contractor = $reflectionClass->getConstructor();
        if(! $contractor){
            return new $id;
        }
        // fetch parameters for constructor
        
        $parameters = $contractor->getParameters();
        if(! $parameters){
            return new $id;
        }
        //make dependency for this parameters if exist
        $dependencies = array_map(
            function(\ReflectionParameter $parameter ) {
                $name = $parameter->getName();
                $type = $parameter->getType();

                if($type instanceof \ReflectionNamedType && ! $type->isBuiltin()){
                    return $this->get($type->getName());
                }
                // if(!$type){
                //     throw new NotFoundContainerException("The $name  is not instantiable ");
                // }

                // if($type instanceof \ReflectionUnionType ){
                //     throw new NotFoundContainerException("The $name  is not instantiable ");
                // }

                // if($type instanceof \ReflectionNamedType && ! $type->isBuiltin()){
                //     return $this->get($type->getName());
                // }
                
                
            },
            $parameters
        );

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}