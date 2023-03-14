<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCustomers(){
        $users = User::where('role_id', 3)->get();
        return view('users.index', compact('users'));
    }

    public function getServiceProviders(){
        $users = User::where('role_id', 2)->get();
        return view('users.index', compact('users'));
    }
    
    public function getUsers(){
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    public function deleteUser(User $user){
        $user->delete();
        return redirect()->to('users.index')->with(['success' => "user deleted successfuly"]);
    }
}
