<?php

namespace App\Http\Controllers;

use App\Adapters\ErrorAdapter;
use App\Entities\Client;
use App\Http\Controllers\Controller;
use App\Models\Client as ClientModel;
use App\UseCases\ClientUseCase;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    private ClientUseCase $client_use_case;
    private ErrorAdapter $error_adapter;

    public function __construct()
    {
        $this->client_use_case = new ClientUseCase(new ClientModel);
        $this->error_adapter = new ErrorAdapter();
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
            $client = new Client(
                $request->input('full_name'),
                $request->input('email'),
                $request->input('phone_number'),
                $request->input('password')
            );

            $store_client_response = $this->client_use_case->store($client);

            return response($store_client_response, 200);
        } catch (\Throwable $th) {
            $error = $this->error_adapter->prepare_data($th->getMessage(), $th->getCode());

            return response([
                'message' =>  $error['error_message']
            ], $error['error_code']);
        }
    }

    public function login(Request $request)
    {
        try {
            $client_email = $request->input('email');
            $client_password = $request->input('password');

            $token = $this->client_use_case->authenticate($client_email, $client_password);

            return response(['token' => $token], 200);
        } catch (\Throwable $th) {
            $error = $this->error_adapter->prepare_data($th->getMessage(), $th->getCode());

            return response([
                'message' =>  $error['error_message']
            ], $error['error_code']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
