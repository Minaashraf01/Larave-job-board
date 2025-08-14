<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginReqest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (LoginReqest $request) {
        $credentials = $request->only('email','password');

        $token = auth('api')->attempt($credentials);

        if(!$token){
            return response()->json(['message'=> "Unthorized Access!"],401);
        }
        return response()->json([
            'access_token' =>$token,
            'expires_in' => auth('api')->factory()->getTTL() *60
        ]);
    }


    public function refresh(){
        $refreshedToken = auth('api')->refresh();

        return response()->json([
            "refresh_token" => "$refreshedToken",
            'expires_in' => auth('api')->factory()->getTTL() *60
        ]);
    }


    public function me(){
            $user= auth('api')->user();
            return response()->json($user);
        }


        
    public function logout(){
        $user=auth('api')->logout(true);
        return response()->json(["message" => "Log Out Successful!"],200);
    }
}
