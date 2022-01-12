<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function Login(Request $request){
        $request->validate([
            'email'=>'required','email',
            'password'=>['required']
        ]);
        if(Auth::attempt($request->only('email','password'))){
            $token = $this->guard()->user()->createToken('auth-token')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }else{
            return response(['message'=>'bad crest'],412);
        }
    }
    public function guard($guard = 'web')
    {
        return Auth::guard($guard);
    }
    public function Logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg'=>'logout success']);
    }
}
