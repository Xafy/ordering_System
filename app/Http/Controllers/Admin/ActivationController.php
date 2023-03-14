<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function acivateProvider(User $user){
        if($user->role_id === 2 && ! $user->is_active){
            $user->update(["is_active" => true]);
            return redirect()->to('users.index')->with(["success" => "user activated successfuly"]);
        }
        return redirect()->to('users.index')->with(["errors" => "user is not a service provider or is already activated"]);
    }

    public function deacivateProvider(User $user){
        if($user->role_id === 2 && $user->is_active){
            $user->update(["is_active" => false]);
            return redirect()->to('users.index')->with(["success" => "user deactivated successfuly"]);
        }
        return redirect()->to('users.index')->with(["errors" => "user is not a service provider or is already deactivated"]);
    }

}