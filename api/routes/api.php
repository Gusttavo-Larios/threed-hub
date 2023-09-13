<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth')->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::post('/client', 'store')->withoutMiddleware('auth');
        Route::get('/client/{id}', 'show');
        Route::put('/client/{id}', 'update');
        Route::delete('/client/{id}', 'destroy');

        // Route::post('/client/login', 'login')->withoutMiddleware('auth');
    });
});
