<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;
use App\Http\Controllers\BaseController;
use Illuminate\Database\QueryException;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\Factory;



class AuthController extends BaseController
{
    public function register(Request $request){
        $request->validate([
            "name"=>"required",
            "password"=>"required|min:8",
            "c_password"=>"required|min:8|same:password",
            "email"=>"required|email|unique:users"

        ]);

        $user=new user();
        $user->name=$request->name;
        $user->password=bcrypt($request->password);
        $user->email=$request->email;
        $user->phone_number=$request->phone_number;
        $user->facebook_url=$request->facebook_url;
        $user->profile_img_url=$request->profile_img_url;
        $user->save();

        $success['user'] =$user;
        $success['type'] = 'Bearer';
        $success['token'] =$user->createToken('MyApp')->accessToken;


        return $this->sendResponse($success,"Done Successfully");
    }


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
    }


    public function profile(User $user){
        $user=auth()->user();
        return $this->sendResponse($user ,'done');
    }


    public function logout(Request $request){
        $token=$request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'

        ]);
    }
}
