<?php

namespace App\Entities;

class Client
{
    private string $full_name;
    private string $email;
    private string $phone_number;
    private string $password;

    public function __construct(
        string $full_name,
        string $email,
        string $phone_number,
        string $password
    ) {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
    }

    public function get_full_name(): string {
        return $this->full_name;
    }

    public function get_email(): string {
        return $this->email;
    }

    public function get_phone_number(): string {
        return $this->phone_number;
    }

    public function get_password(): string {
        return $this->password;
    }

}
