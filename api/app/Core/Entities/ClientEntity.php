<?php

namespace App\Core\Entities;

interface ClientEntity
{
    public function get_id();
    public function set_id(string $id);

    public function get_full_name();
    public function set_full_name(string $full_name);

    public function get_email();
    public function set_email(string $email);

    public function get_phone_number();
    public function set_phone_number(string $phone_number);

    public function get_password();
    public function set_password(string $password);
}
