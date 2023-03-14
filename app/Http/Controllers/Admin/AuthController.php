<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    public function adminLoginForm(){
        return view('users.adminForm');
    }

    public function login(Request $request){
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validateUser->fails()){
                return redirect()->to(route('admin.loginForm'))->with(["errors" => $validateUser->getMessage()]);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return redirect()->to(route('admin.loginForm'))->with(["errors" => 'Email & Password does not match with our record.']);
            }

            $user = User::where('email', $request->email)->first();

            if(! $user->role_id === 1){
                return redirect()->to(route('admin.loginForm'))->with(["errors" => 'These credentials are not for an admin user']);
            } 

            Auth::login($user);

            return redirect()->to(route('orders.all'))->with(["success" => "You logged in succesfuly"]);

        } catch (Throwable $err){
            return redirect()->to(route('admin.loginForm'))->with(["errors" => $err->getMessage()]);
        }
    }

}
