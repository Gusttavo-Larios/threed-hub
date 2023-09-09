<?php

namespace App\UseCases;

use App\Entities\Client;
use App\Models\Client as ClientModel;
use Exception;

class ClientUseCase
{
    private ClientModel $client_model;

    public function __construct(ClientModel $client_model)
    {
        $this->client_model = $client_model;
    }


    public function store(Client $client)
    {
        $encrypted_password = sha1($client->get_password());

        try {
            return $this->client_model->create([
                'full_name' => $client->get_full_name(),
                'email' => $client->get_email(),
                'phone_number' => $client->get_phone_number(),
                'password' => $encrypted_password,
            ]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 500, $th->getPrevious());
        }
    }
}
