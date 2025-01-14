<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlwakLoginRequest;
use App\Http\Requests\AlwakRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authscontroller extends Controller
{
    public function login(AlwakLoginRequest $alwakLoginRequest)
    {
        $data = $alwakLoginRequest->validated();

        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $user = auth()->user();

            /** @var User $user */

            $token = $user->createToken('main')->plainTextToken;

            return response(compact('user', 'token'));
        }

        return response('You have entered wrong password. Enter correct password or try resetting your password from the link below!  ', 399);
    }

    public function register(AlwakRegisterRequest $alwakRegisterRequest)
    {


        $data = $alwakRegisterRequest->validated();

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'isUsernameEmail' => $data['isEmailField'],
        ]);

        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {

            $user = auth()->user();

            /** @var User $user */
            $token = $user->createToken('main')->plainTextToken;

            return response(compact('user', 'token'));
        }

        return response('error', 399);
    }


    public function logout(Request $request)
    {
        $user = $request->user();

        /** @var User $user */

        $user->currentAccessToken()->delete;


        return response('', 200);
    }
}
