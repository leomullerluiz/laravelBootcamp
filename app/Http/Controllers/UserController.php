<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    public function register(Request $request){
        
        $fields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')],//Multiplos Validadores
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required'//Validador Unico
        ]);

        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request){
        $fields = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->attempt([
            'name' => $fields['loginName'],
            'password' => $fields['loginPassword']
        ])){
            $request->session()->regenerate();
        }

        return redirect('/');

    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }



}
