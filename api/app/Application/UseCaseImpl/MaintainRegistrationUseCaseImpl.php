<?php

namespace App\Application\UseCaseImpl;

use App\Core\Entities\ClientEntity;
use App\Core\UseCases\MaintainRegistrationUseCase;

use App\Application\ExceptionsImpl\ClientNotFoundExceptionImpl;

use App\InterfaceAdapters\Database\ClientRepository;
use App\Infrastructure\Database\ClientRepositoryImpl;

class MaintainRegistrationUseCaseImpl implements MaintainRegistrationUseCase
{

    private ClientRepository $client_repository;


    public function __construct()
    {
        $this->client_repository = new ClientRepositoryImpl();
    }

    public function create_client(ClientEntity $client): ClientEntity
    {
        $password_encrypted = $this->encrypt_password($client->get_password());
        $client->set_password($password_encrypted);

        return $this->client_repository->create_client($client);
    }

    public function read_client(string $id): ClientEntity | null
    {
        $result = $this->client_repository->read_client($id);

        if (!isset($result)) {
            throw new ClientNotFoundExceptionImpl();
        }

        return $result;
    }

    public function update_client(string $id, ClientEntity $client): void
    {

        $result = $this->client_repository->read_client($id);

        if (!isset($result)) {
            throw new ClientNotFoundExceptionImpl();
        }

        $this->client_repository->update_client($id, $result);
    }

    public function delete_client(string $id): void
    {
        
        $result = $this->client_repository->read_client($id);

        if (!isset($result)) {
            throw new ClientNotFoundExceptionImpl();
        }
        
        $this->client_repository->delete_client($id);
    }

    public function encrypt_password(string $password): string
    {
        return sha1($password);
    }
}
