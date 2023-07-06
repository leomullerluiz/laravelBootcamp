<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function register(Request $request){
        
        $fields = $request->validate([
            'name' => ['required', 'min:3'],//Multiplos Validadores
            'email' => ['required', 'email'],
            'password' => 'required'//Validador Unico
        ]);

        $fields['password'] = bcrypt($fields['password']);
        User::create($fields);

        return "Hello User Controller";
    }
}
