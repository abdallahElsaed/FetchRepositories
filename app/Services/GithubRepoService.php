<?php 

namespace App\Services;

use App\Config\ApiEndpoints;
use App\Exceptions\QueryException;
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

    
    /**
     * Retrieves data based on the provided parameters.
     *
     * @param array $quires_data An array of data containing the following keys:
     *                           - created_at: The creation date of the data.
     *                           - repos_number: The number of repositories.
     *                           - language: The language of the repositories.
     * @throws QueryException If both created_at and language are missing.
     * @return array An array of filtered data based on the provided parameters.
     */
    public function getData($quires_data = []){
        $this->created_at = $quires_data['created_at'];
        $this->repos_number = $quires_data['repos_number'];
        $this->language = $quires_data['language'];
        if(!$this->created_at && ! $this->language  ){
            throw new QueryException();
        }
        $url = $this->accessUrl();
        $response = $this->response($url);
        $repos = json_decode($response, true);
        $filter_data= $this->filterData($repos);
        if( $this->repos_number){
            $filter_data = array_slice($filter_data, 0, $this->repos_number);
        }
        return $filter_data;
    }

        /**
     * Sends a GET request to the specified URL and returns the response.
     *
     * @param string $url The URL to send the request to.
     * @throws ResponseException If an error occurs during the request.
     * @return string The response from the URL.
     */
    public function response($url){
        $handel = curl_init($url);
        curl_setopt($handel, CURLOPT_HTTPHEADER, [
            'User-Agent: githubRepos' 
        ]);
        curl_setopt($handel, CURLOPT_URL, $url);
        curl_setopt($handel, CURLOPT_RETURNTRANSFER, $url);
        $response = curl_exec($handel);
        if (curl_error($handel)) {
            throw new ResponseException();
        }
        return  $response;
    }

        /**
     * Filters the given data and returns an array of repositories.
     *
     * @param array $repos The data to be filtered.
     * @throws ResponseException If the $repos variable is empty.
     * @return array The filtered array of repositories.
     */
    public function filterData($repos): array{
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

        /**
     * Generates the URL to access the GitHub API based on the provided filters.
     *
     * @return string The generated URL.
     */
    public function accessUrl() : string{
        $config  = include( CONFIG_PATH . "EndpointConfig.php"); 
        $githubApiUrl = $config['Github'];
        if($this->created_at &&   $this->language  ){
            $queries = "created:>" . urlencode($this->created_at). "+language:" . urlencode($this->language) ;
        }else{
            $queries=$this->created_at ? "created:>" . $this->created_at : "language:" . $this->language;
        }
        $url = $githubApiUrl . $queries . "&sort=stars&order=desc" ;
        return $url ;
    }
}