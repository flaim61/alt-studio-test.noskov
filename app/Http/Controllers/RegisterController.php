<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $req){
        $user = User::create([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password'))
        ]);

        if($user){
            auth("web")->login($user);
        }

        return redirect(route('home'));
    }

  public function logout(){
      auth('web')->logout();
      return redirect(route('home'));
  }

  public function login(LoginRequest $req){
    $user = $req->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt(['email' => $user['email'], 'password' => $user['password']])) {
      return redirect(route('home'));
    }

    return back()->withErrors([
        'email' => 'Пользователь не найден или вы ввели не правильные данные',
    ]);
  }

  public function getUserId(){
    $user = auth()->user();

    if($user){
      return $user->id;
    }
  }


}
