<?php

namespace App\Adapters;

class ErrorAdapter
{


    public function prepare_data(
        string $error_message,
        int $error_code = 400
    ) {
        $error_code = !($error_code > 399 and $error_code < 600) ? $error_code  : 500;

        return [
            "error_message" => $error_message,
            "error_code" => $error_code,
        ];
    }
}
