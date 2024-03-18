<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //autenticação de login (email e senha)

        $credenciais = $request->all(['email', 'password']);
        $token = auth('api')->attempt($credenciais);

        if ($token) {
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Logout realizado com suuceso!']);
    }
    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json(['token' =>$token]);
    }
    public function me()
    {
        return response()->json(auth()->user());
    }
}
