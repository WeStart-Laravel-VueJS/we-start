<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    function login(Request $request) {
        // $request->validate([
        //     'email' => 'required'
        // ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            // 'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return $this->message($validator->errors(), 'Login Failed', false, 500);
        }

        // Check if the user exists
        // $user = User::where('email',$request->email)->first();

        // if(!$user) {
        //     return response()->json(['error'=>'Unauthorised'],422);
        // }

        // Check user password
        // $user = User::where('email',$request->email)->first();
        // if(Hash::check($request->password, $hashedValue))

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = Auth::user()->createToken('login')->plainTextToken;

            $data = [
                'lang' => $request->header('Accept-Language'),  
                'user' => Auth::user(),
                'token' => $token
            ];

            return $this->message($data, 'Login Successfully', true, 200);
            // $tokenResult = $user->createToken('login')->plainTextToken;
        }else {
            return $this->message([], 'Password incorrect', false, 422);
        }


        // return $user;

    }
}
