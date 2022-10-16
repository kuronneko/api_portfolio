<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class PassportAuthController extends Controller
{
    public function register(Request $request){

        try {
            $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:20', 'regex:/^[a-zA-Z0-9]+$/'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed', Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'uuid' => Str::uuid(),
            ]);
            $token = $user->createToken('Token')->accessToken;
            return response()->json(['token' => $token], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }

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
            return response()->json(['error' => 'These credentials do not match our records.']);
        }
    }

    public function logout(){
        //$user = User::find(Auth::user()->id);
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json(['success' => 'Logout successfully']);
    }
}
