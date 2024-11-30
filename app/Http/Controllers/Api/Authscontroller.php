<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlwakAuthRequest;
use App\Http\Requests\SawaStaffRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authscontroller extends Controller
{
    public function login(AlwakAuthRequest $alwakAuthRequest){
        $data = $alwakAuthRequest->validated();

        if(Auth::attempt(['username'=>$data['username'],'password'=>$data['password']])){
            $user = auth()->user();

            /** @var User $user */

            $token = $user->createToken('main')->plainTextToken;

            return response(compact('user','token'));
        }

        return response('Credentials does not match',399);
    }

    public function register(SawaStaffRegisterRequest $sawaStaffRegisterRequest){
        $data = $sawaStaffRegisterRequest->validated();


        $user = User::create([
            'name'=>$data['name'],
            'username'=>$data['username'],
            'password'=>Hash::make($data['password']),
            'isUsernameEmail'=>$data['isEmailField'],
        ]);

        if(Auth::attempt(['username'=>$data['username'],'password'=>$data['password']])){

            $user = auth()->user();

            /** @var User $user */
            $token = $user->createToken('main')->plainTextToken;

            return response(compact('user','token'));
        }

        return response('error',399);
    }
}
