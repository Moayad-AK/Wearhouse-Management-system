<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $login=[
            'password'=>$request->password,
            'email'=>$request->email

        ];
        if(!auth()->attempt($login)){
            return $this->sendError('Validate Error',404);
        }

        $user = Auth::user();

        $success['user'] =$user;
        $success['type'] = 'Bearer';
        $success['token'] =$user->createToken('MyApp')->accessToken;

        return $this->sendResponse($success, 'done');
    }}
