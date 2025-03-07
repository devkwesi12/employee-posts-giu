<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller 
{
    //
    public function register(Request $request){
        //return 'register';
       $fields =  $request->validate(
            [
                "name"=>"required|max:255",
                "email"=> "required|email|unique:users",
                "password"=> "required|confirmed"
            ]
            );

            $user = User::create($fields);
            $token = $user->createToken($request->name);

            return[
                'users'=>$user,
                "token"=> $token,
            ];
    }

    public function login(Request $request){
        //return 'login';
         $request->validate(
            [
             
                "email"=> "required|email|exists:users,email",
                "password"=> "required"
            ]
            );
            $user = User::where("email", $request->email)->first();

            if(!$user || !Hash::check($request->password,$user->password)){

                return [
                    'message'=>'The provided credentials are incorrect',
                ];

            }

            $token = $user->createToken($user->name);

            return[
                'users'=>$user,
                "token"=> $token,
            ];
    }

    public function logout(Request $request){
     //   return 'logout';

     $request->user()->tokens()->delete();

     return [ 
        "message"=> "You are logged out",
     ];
    }
}
