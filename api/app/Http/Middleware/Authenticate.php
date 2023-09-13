<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Se o token for válido, ele retorna o usuário autenticado
            $token = $request->bearerToken();

            $user = JWTAuth::parseToken($token)->getAuthenticatedUser();
            // ::parseToken()->getAuthenticatedUser();
            return response(['token teste' => $token, 'user' => $user], 200);


            // Se tudo der certo, ele passará o request para o próximo middleware
            return $next($request);
        } catch (JWTException $e) {
            // Se o token for inválido, ele retorna uma mensagem de erro
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
