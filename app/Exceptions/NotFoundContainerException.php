<?php 

namespace App\Exceptions;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundContainerException extends \Exception implements NotFoundExceptionInterface{

}