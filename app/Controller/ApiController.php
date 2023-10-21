<?php 
namespace App\Controller;

use App\View;
use App\Services\GithubRepoService;

class ApiController{
    public   function index(): string {
        return  View::make('index' ,['foo' => 'bar' , 'x' => 'y']);
    }

    public   function apiResult(){
        // fetch query from request  $_GET[] (✔)
        $query_data = $_POST;
        // var_dump($query_data);
        //throw the data from request to GithubService to get the data getData();
        $repository = (new GithubRepoService())->getData($query_data);
var_dump($repository);


        //return the data array ([ [] , [] ,[] ]) to view 

        return  View::make('index', [
           
            // 'username' => $repository['username'],
            // 'repo_name' => $repository['repo_name'],
            // 'created_at' => $repository['created_at'],
            // 'stargazers_count' => $repository['stargazers_count'],
            // 'language' => $repository['language'],
        ]);
    }

    //TODO in the future we can fetch data from another api
}