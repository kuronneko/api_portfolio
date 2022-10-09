<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PassportAuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request){

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        //$user = User::find(Auth::user()->id);
        if(auth()->attempt($credentials)){
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error' => 'Credenciales erroneas']);
        }
    }

    public function logout(){
        //$user = User::find(Auth::user()->id);
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json(['success' => 'Logout successfully']);
    }
}
