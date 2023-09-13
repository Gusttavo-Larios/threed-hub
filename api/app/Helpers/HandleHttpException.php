<?php
namespace App\Helpers;

class HandleHttpException
{

    static function handle_error_code(int $code): int
    {
        return ($code > 399 and $code < 600) ? $code  : 500;
    }
}
