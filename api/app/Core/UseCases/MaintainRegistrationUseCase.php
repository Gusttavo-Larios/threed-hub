<?php

namespace App\Core\UseCases;

use App\Core\Entities\ClientEntity;

interface MaintainRegistrationUseCase
{
    public function create_client(ClientEntity $client): ClientEntity;

    public function read_client(string $id): ClientEntity | null;

    public function update_client(string $id, ClientEntity $client);

    public function delete_client(string $id): void;

    public function encrypt_password(string $password): string;
}
