<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    public function login(Request $request){
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                "status" => 1,
                "message" => "تم تسجيل الدخول بنجاح",
                "data" => [
                        "token" => $token,
                        "user" => $user
                    ]
                ], 200);

        } catch (Throwable $err){
            return response()->json([
                'status' => false,
                'message' => $err->getMessage()
            ], 500);
        }
    }

}
