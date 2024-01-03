<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData=$request->validate([
            "username"  => "required|max:255",
            "email"=> "required|email|unique:users",
            "password"=> "required|confirmed",
        ]);
        $validatedData['password']=Hash::make($request->password);
        $user=User::create($validatedData);
        $accessToken=$user->createToken('authToken')->accessToken;
        return response([
            'user'=> $user,
            'accessToken'=> $accessToken
        ]);
    }
    public function login(Request $request)
    {
        $loginData=$request->validate([
            'username'=> 'required',
            'password'=> 'required'
            ]);
        if (!auth()->attempt($loginData)) {
            return response([
                'message'=> 'Credenciales invalidas'
                ]);
        }
        $accessToken=auth()->user()->createToken('authToken')->accessToken;
        return response([
            'user'=>auth()->user(),'access_token'=> $accessToken
            ]);
        
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            // Revoke all access tokens for the user
            $user->tokens()->delete();

            return response(['message' => 'Logout exitoso']);
        } else {
            return response(['message' => 'No hay usuario autenticado'], 401);
        }
    }
}