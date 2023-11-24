<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData=$request->validate([
            "name"  => "required|max:255",
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
            'email'=> 'email|required',
            'password'=> 'required'
            ]);
        if (!auth()->attempt($loginData)) {
            return response([
                'message'=> 'Credenciales invalidas'
                ]);
        }
        $accessToken=auth()->user()->createToken('authToken')->accessToken;
        return response([
            'user'=>auth()->user(),'access_toekn'=> $accessToken
            ]);
        
    }

}