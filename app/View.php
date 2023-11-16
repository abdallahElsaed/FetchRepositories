<?php 

namespace App;

use App\Exceptions\ViewException;


class View{
    public function __construct(
        protected string $view ,
        protected array $parameters = [],
    ){}

    public static function make(string $view , array $parameters = []) {
        return new static($view , $parameters);
    }

    public function render()
    { 
        $viewPath = RESOURCE_PATH .$this->view . '.php' ;
        if(!file_exists($viewPath)){
            throw new  ViewException();
        }
        //to access the variable in view without ($this->) but only $variableName
        foreach ($this->parameters as $key => $value) {
            $$key = $value ;
        } 
        ob_start();
        include $viewPath ;
        return ob_get_clean(); // return the view as string from output buffer
    }
    public function __toString(){
        return  $this->render();
    }

    public function __get($name){
        return $this->parameters[$name];
    }
}