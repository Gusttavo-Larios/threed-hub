<?php

namespace App\UseCases;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

use Exception;

use App\Entities\Client;
use App\Models\Client as ClientModel;


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

    public function authenticate(string $email, string $password)
    {
        $client = $this->client_model->firstWhere('email', '=', $email)->toArray();

        $password_is_valid = $this->validate_password($client['password'], $password);


        if (!$password_is_valid) {
            throw new Exception('Senha ou usuário incorreto.', 401);
        }

        $token = $this->generate_token($client['id']);

        return $token;
    }

    public function validate_password($password_encrypted, $value_to_be_compared): bool
    {
        return $password_encrypted == sha1($value_to_be_compared);
    }

    private function generate_token($client_id)
    {
        $payload = JWTFactory::make([
            'exp' => time() + 10,
            'iat' => time(),
            'id' => $client_id
        ]);

        return JWTAuth::encode($payload)->get();
    }
}
