<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginReqest;
use App\Http\Requests\SignupReqest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // GET (singup)  GET ,(login) POST ,(singup)  POST ,(Login) POST Logout 

    public function ShowSignupForm(){
        return view('auth.register');
    }
    
    public function Signup(SignupReqest $request){
        $sign = new User();
        $sign->name = $request->input('name');
        $sign->email =$request->input('email');
        $sign->password =$request->input('password');
        $sign->save();

        auth()->login($sign);
        return redirect('/home')->with('success','Created Successfully!');
    }

    public function ShowLoginForm(){
        return view('auth.login');
    }
    public function Login(LoginReqest $request){
        $credentials = $request->only('email','password');
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/home');
        }
        return back()->withErrors([
            'email' => 'the provided credentials do not match our records.',
        ])->withInput();
    }

    public function Logout(){
        auth()->logout();
        return redirect('/home');
    }
}
