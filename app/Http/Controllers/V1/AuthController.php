<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', $credentials['email']);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Successfully logged in',
            'data' => [
                'accessToken' => $token,
                'user' => $user
            ],
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(compact('token'));
    }

    public function signUp(Request $request) 
    {
        $userData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $role = Role::where("name", "admin")->get()[0];
        // return $role;
        if ($role === null) {
            return response([
                'status' => 'Error ',
                'message' => 'Role nao encontrado',
            ], 404);
        }

        $userData['role_id'] = $role->id;

        $createdUser = User::create($userData);

        return [
            'status' => 'Ok',
            'message' => 'User created successfullly!',
            'data' => $createdUser
        ];
    }
}

