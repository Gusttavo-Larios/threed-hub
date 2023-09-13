<?php

namespace App\Application\EntitiesImpl;

use App\Core\Entities\ClientEntity;

class ClientEntityImpl implements ClientEntity
{
    private string | null $id;
    private string $full_name;
    private string $email;
    private string $phone_number;
    private string $password;

    public function __construct(
        string | null $id,
        string $full_name,
        string $email,
        string $phone_number,
        string $password
    ) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
    }

    public function get_id(): string
    {
        return $this->id;
    }

    public function set_id(string $id): void
    {
        $this->id = $id;
    }

    public function get_full_name(): string
    {
        return $this->full_name;
    }

    public function set_full_name(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    public function get_email(): string
    {
        return $this->email;
    }

    public function set_email(string $email): void
    {
        $this->email = $email;
    }

    public function get_phone_number(): string
    {
        return $this->phone_number;
    }

    public function set_phone_number(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function get_password(): string
    {
        return $this->password;
    }

    public function set_password(string $password): void
    {
        $this->password = $password;
    }
}
