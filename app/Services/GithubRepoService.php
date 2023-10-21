<?php 

namespace App\Services;

use App\Exceptions\ResponseException;

class GithubRepoService {

    protected array $quires_data = [];
    protected string $username = '';
    protected string $repo_name = '';
    protected string $created_at = '';
    protected string $stargazers_count = '';
    protected string $repos_number = '';
    protected string $language = '';

    public array $repositories;

    
    public function getData($quires_data = []){
        // $this->username = $quires_data['username'] ;
        // $this->repo_name = $quires_data['repo_name'];
        $this->created_at = $quires_data['created_at'];
        $this->repos_number = $quires_data['repos_number'];
        $this->language = $quires_data['language'];

        if(!$quires_data){
            throw new ResponseException();
        }
        $url = "https://api.github.com/search/repositories?q=created:>" ."+language:" .urlencode($this->language) . "&sort=stars&order=desc" ;
        
        $response = $this->response($url);
    
        $repos = json_decode($response, true);

        $filter_data= $this->filterData($repos);
        // var_dump($filter_data);
        return $filter_data;
 
    }

    public function response($url){
        $handel = curl_init($url);
        curl_setopt($handel, CURLOPT_HTTPHEADER, [
            'User-Agent: apiRepos' // Replace 'YourAppName' with your application's name
        ]);
        curl_setopt($handel, CURLOPT_URL, $url);
        curl_setopt($handel, CURLOPT_RETURNTRANSFER, $url);
        $response = curl_exec($handel);
       
        if (curl_error($handel)) {
            throw new ResponseException();
        }

        return  $response;
    }

    public function filterData($repos){
       if(!$repos){
            throw new ResponseException();
        }
        foreach($repos['items'] as $repo){
            $this->username = $repo['owner']['login'] ?? '';
            $this->repo_name = $repo['name'] ?? '';
            $this->created_at = $repo['created_at'] ?? '';
            $this->stargazers_count = $repo['stargazers_count'] ?? '' ;
            $this->language = $repo['language'] ?? '';
 
            $this->repositories[] = [ 
                'username' => $this->username,
                'repo_name' => $this->repo_name,
                'created_at' => $this->created_at,
                'stargazers_count' => $this->stargazers_count,
                'language' => $this->language,
            ];
        }
        return $this->repositories;
    }
}