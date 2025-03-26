<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        // 1. Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        } else{
            $crendentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($crendentials)) {

                $user = User::find(Auth::user()->id);
                $token = $user->createToken('Token')->plainTextToken;
                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'id' => $user->id,
                ]);
            } else{
                return response()->json([
                    'status' => false,
                    'message' => 'Either paswords/email is incorrect'
                ]);
            }
        }

    }
    public function logout(){
        $user = User::find(Auth::user()->id);
        $user->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'logout successfully'
        ]);
    }
}
