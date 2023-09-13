<?php

namespace App\Application\ExceptionsImpl;

use Exception;

class ClientNotFoundExceptionImpl extends Exception 
{
    public function __construct()
    {
        parent::__construct('O cliente requisitado não foi encontrado!', 404);
    }
}
