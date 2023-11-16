<?php 
namespace App\Controller;

use App\Core\View;
use App\Services\GithubRepoService;

class ApiController{

    protected  array $repository = [];
    public   function index() {
        return  View::make('index' , ['foo' => 'bo']);
    }

    public   function apiResult(){
        // fetch query from request  $_POST[] (✔)
        $query_data = $_POST;
        //throw the data from request to GithubService to get the data getData();
        //return the data array ([ [] , [] ,[] ]) to view 
        $this->repository = (new GithubRepoService())->getData($query_data) ;
        // i use this way because the View::make don't work with array
        include RESOURCE_PATH . 'index.php';
    }
    public function x(){
        echo "hello from api controller";
    }
}


//TODO in the future we can fetch data from another api