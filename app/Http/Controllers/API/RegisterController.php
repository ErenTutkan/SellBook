<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register(Request $request){

        $request->validate([
            'name'=>['required'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:6','max:18']
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
    }
}
