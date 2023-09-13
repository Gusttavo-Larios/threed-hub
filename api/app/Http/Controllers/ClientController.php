<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Application\EntitiesImpl\ClientEntityImpl;
use App\Application\UseCaseImpl\MaintainRegistrationUseCaseImpl;

use App\Helpers\HandleHttpException;

class ClientController extends Controller
{

    private MaintainRegistrationUseCaseImpl $maintain_registration_use_case_impl;

    public function __construct()
    {
        $this->maintain_registration_use_case_impl = new MaintainRegistrationUseCaseImpl();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $client = new ClientEntityImpl(
                null,
                $request->input('full_name'),
                $request->input('email'),
                $request->input('phone_number'),
                $request->input('password')
            );

            $new_client = $this->maintain_registration_use_case_impl->create_client(
                $client
            );

            return response([
                'id' => $new_client->get_id(),
                'full_name' => $new_client->get_full_name(),
                'email' => $new_client->get_email(),
                'phone_number' => $new_client->get_phone_number(),
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => $th->getMessage()
            ], HandleHttpException::handle_error_code($th->getCode()));
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $client = $this->maintain_registration_use_case_impl->read_client(
                $id
            );

            return response([
                'id' => $client->get_id(),
                'full_name' => $client->get_full_name(),
                'email' => $client->get_email(),
                'phone_number' => $client->get_phone_number(),
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => $th->getMessage()
            ], HandleHttpException::handle_error_code($th->getCode()));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $client = new ClientEntityImpl(
                null,
                $request->input('full_name'),
                $request->input('email'),
                $request->input('phone_number'),
                $request->input('password')
            );

            $this->maintain_registration_use_case_impl->update_client(
                $id,
                $client
            );

            return response([
                'message' => 'Cliente atualizado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => $th->getMessage()
            ], HandleHttpException::handle_error_code($th->getCode()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $this->maintain_registration_use_case_impl->delete_client(
                $id
            );

            return response([
                'message' => 'Cliente exluído com sucesso!'
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => $th->getMessage()
            ], HandleHttpException::handle_error_code($th->getCode()));
        }
    }
}
