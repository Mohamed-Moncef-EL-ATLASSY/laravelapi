<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function userRegister(Request $request){
        $fields = $request->validate([
            'userFirstName' => 'required|string',
            'userLastName'  => 'required|string',
            'userEmail'     => 'required|string|unique:users,userEmail',
            'userPassword'  => 'required|string|confirmed',
        ]);

        $user = User::create([
            'userFirstName' => $fields['userFirstName'],
            'userLastName'  => $fields['userLastName'],
            'userEmail'     => $fields['userEmail'],
            'userPassword'  => bcrypt($fields['userPassword']),
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
