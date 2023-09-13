<?php

namespace App\Infrastructure\Database;

use App\Application\EntitiesImpl\ClientEntityImpl;
use App\Core\Entities\ClientEntity;
use App\InterfaceAdapters\Database\ClientRepository;
use App\Models\Client;

class ClientRepositoryImpl implements ClientRepository
{
    public function create_client(ClientEntity $client): ClientEntity
    {
        $result = Client::create([
            'full_name' => $client->get_full_name(),
            'email' => $client->get_email(),
            'phone_number' => $client->get_phone_number(),
            'password' => $client->get_password(),
        ]);

        return new ClientEntityImpl($result['id'], $result['full_name'], $result['email'], $result['phone_number'], $result['password']);
    }

    public function read_client(string $id): ClientEntity | null
    {
        $result = Client::find($id);

        return isset($result) ? new ClientEntityImpl($result['id'], $result['full_name'], $result['email'], $result['phone_number'], $result['password']) : null;
    }

    public function update_client(string $id, ClientEntity $client): void
    {
        Client::where('id', $id)
            ->update([
                'full_name' => $client->get_full_name(),
                'email' => $client->get_email(),
                'phone_number' => $client->get_phone_number(),
                'password' => $client->get_password(),
            ]);
    }

    public function delete_client(string $id): void
    {
        Client::destroy($id);
    }
}
