<?php

namespace App\UseCases;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

use Exception;

use App\Models\Client as ClientModel;


class ClientUseCase
{
    private ClientModel $client_model;

    public function __construct(ClientModel $client_model)
    {
        $this->client_model = $client_model;
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
            'sub' => $client_id,
        ]);

        return JWTAuth::encode($payload)->get();
    }
}
