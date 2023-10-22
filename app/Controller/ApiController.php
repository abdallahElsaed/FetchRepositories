<?php 
namespace App\Controller;

use App\View;
use App\Services\GithubRepoService;

class ApiController{

    protected array $repository;
    public   function index(): string {
        return  View::make('index');
    }

    public   function apiResult(){
        // fetch query from request  $_GET[] (✔)
        $query_data = $_POST;

        //throw the data from request to GithubService to get the data getData();
        //return the data array ([ [] , [] ,[] ]) to view 
        $this->repository = (new GithubRepoService())->getData($query_data);

        // var_dump($this->repository);
        // i use this way because the View::make don't work with array
        include RESOURCE_PATH . 'index.php';
    }

    //TODO in the future we can fetch data from another api
}