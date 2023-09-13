<?php

namespace App\InterfaceAdapters\Database;

use App\Core\Entities\ClientEntity;

interface ClientRepository {
    public function create_client(ClientEntity $client): ClientEntity;

    public function read_client(string $id): ClientEntity | null;

    public function update_client(string $id, ClientEntity $client): void;

    public function delete_client(string $id): void;
}