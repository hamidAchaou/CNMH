<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(){
        return view('auth.login');
    }
    
    public function login(LoginRequest $request){
      $credentials = $request->validated();

      if(Auth::attempt($credentials)){
          $request->session()->regenerate();
          return redirect()->route('tasks.index');
    //   return redirect()->intended(route('tasks.index'));
      }
      return to_route('login')->withErrors([
        'email' => 'email invalide'
      ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
