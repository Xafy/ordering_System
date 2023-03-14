<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    public function register(Request $request){
        try {

            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);
            if($validateUser->fails()){
                return redirect()->to(route('users.register'))->with(["error" => $validateUser->errors()]);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
            ]);
            Auth::login($user);

            return redirect()->to(route('users.login'))->with(["success" => "You registered succesfuly"]);

        } catch (Throwable $err) {
            return redirect()->to(route('users.register'))->with(["error" => $err->getMessage()]);
        }
    }

    public function updateUser(Request $request, User $user){
        try {

            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'. $user->id,
            ]);

            if($validateUser->fails()){
                return redirect()->to(route('users.edit'))->with(["errors" => $validateUser->errors()]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->to(route('users.login'))->with(["success" => "Your informations are updated succesfuly"]);

        } catch (Throwable $err) {
            return redirect()->to(route('users.edit'))->with(["error" => $err->getMessage()]);
        }
    }

    public function login(Request $request){
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validateUser->fails()){
                return redirect()->to(route('users.login'))->with(["errors" => $validateUser->getMessage()]);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return redirect()->to(route('users.login'))->with(["errors" => 'Email & Password does not match with our record.']);
            }

            $user = User::where('email', $request->email)->first();

            if($user->role_id === 3){
                return redirect()->to(route('users.login'))->with(["errors" => 'These routes are not available for Cutomers you may use the api']);
            } 

            Auth::login($user);

            return redirect()->to(route('services.index'))->with(["success" => "You logged in succesfuly"]);

        } catch (Throwable $err){
            return redirect()->to(route('users.login'))->with(["errors" => $err->getMessage()]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->to(route('users.login'))->with(["success" => "successfully loged out"]);
    }
}
