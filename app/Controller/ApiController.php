<?php 
namespace App\Controller;

use App\View;
use App\Exceptions\QueryException;
use App\Services\GithubRepoService;

class ApiController{

    protected array $repository;
    public   function index(): string {
        return  View::make('index');
    }

    public   function apiResult(){
        // fetch query from request  $_GET[] (✔)
        if(!$_POST){
            throw new QueryException();
        }
        $query_data = $_POST;
        // var_dump($query_data);
        //throw the data from request to GithubService to get the data getData();
        $this->repository = (new GithubRepoService())->getData($query_data);

        //return the data array ([ [] , [] ,[] ]) to view 

        // return  View::make('index', [
        //     'repository' => $repository,
            // 'username' => $repository['username'],
            // 'repo_name' => $repository['repo_name'],
            // 'created_at' => $repository['created_at'],
            // 'stargazers_count' => $repository['stargazers_count'],
            // 'language' => $repository['language'],
        // ]);

        // i use this way because the View::make don't work with array
        include RESOURCE_PATH . 'index.php';
    }

    //TODO in the future we can fetch data from another api
}