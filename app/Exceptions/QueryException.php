<?php

namespace App\Exceptions;

class QueryException extends \Exception{

    protected $message = "Query Not Found, you must enter one query at least to search" ;
}
