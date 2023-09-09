<?php

namespace App\Adapters;

use Throwable;

class ErrorAdapter
{
    // private string $error_message;
    // private int $error_code;
    // private Throwable | null $previous;

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


    // public function __construct(
    //     string $error_message,
    //     int $error_code = 400,
    //     Throwable | null $previous
    // ) {
    //     $this->error_message = $error_message;

    //     $error_code = !($error_code > 399 and $error_code < 600) ? $error_code  : 500;

    //     $this->error_code = $error_code;
    //     $this->previous = $previous;
    // }

    // public function get_error_message(): string
    // {
    //     return $this->error_message;
    // }

    // public function get_error_code(): int
    // {
    //     return $this->error_code;
    // }

    // public function get_previous(): Throwable | null
    // {
    //     return $this->previous;
    // }
}
