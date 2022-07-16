<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:5|max:10|confirmed',
            'password_confirmation' => 'required|string|min:5|max:10',
            'cpf' => 'required|string|min:5|max:15',
            'matricula' => 'required|string|min:5|max:25',
            'image' => 'image',
            'turn_id' => 'required',
            'office_id' => 'required',
            'sector_id' => 'required',
        ]);

        $file = $request->image;

        if($file) {
            $nameFile = $file->getClientOriginalName();
            $file = $file->storeAs('users', $nameFile);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'cpf' => $request->cpf,
            'matricula' => $request->matricula,
            'image' => $file ,
            'turn_id' => $request->turn_id,
            'office_id' => $request->office_id,
            'sector_id' => $request->sector_id,
        ]);

        // Criação do token do usuário
        $token = $user->createToken('primeirotoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    } 

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // ckecka email do usuário 
        $user = User::where('email', $request->email)->first();

        // validade usuario e checa o password
        if(!$user || !Hash::check($request->password, $user->password)){

            return route('api/login');
            return response([
                'message' => 'Credenciais invalidas'
            ], 401);
        }

        // Criação do token do usuário
        $token = $user->createToken('primeirotoken')->plainTextToken;

        $response = [
            'user' => $user,
            'tokenn' => $token
        ];

        return response($response, 201);
    }

    public function logout() 
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logout efetuado com sucesso e exclusão dos tokens.'
        ];
    }
}
