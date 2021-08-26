<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function userRegister(Request $request){
        $fields = $request->validate([
            'userFirstName' => 'required|string',
            'userLastName'  => 'required|string',
            'userEmail'     => 'required|string|unique:users,userEmail',
            'password'      => 'required|string|confirmed',
        ]);

        $user = User::create([
            'userFirstName' => $fields['userFirstName'],
            'userLastName'  => $fields['userLastName'],
            'userEmail'     => $fields['userEmail'],
            'password'      => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }


    public function userLogin(Request $request){
        $fields = $request->validate([
            'userEmail'     => 'required|string',
            'password'      => 'required|string',
        ]);

        $user = User::where('userEmail', $fields['userEmail'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'User not existing!'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }


    public function userLogout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out successfully/ Token destroyed successfully'
        ];
    }
}
