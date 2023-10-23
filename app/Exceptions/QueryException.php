<?php

namespace App\Exceptions;

class QueryException extends \Exception{

    protected $message = "Query Not Found, you must enter  one query  from created at or language at least  to search" ;
}
