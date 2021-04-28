<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function getRegister() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event (new Registered($user));

        auth()->login($user);
        return redirect('/email/verify');
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($credentials)) {
            return redirect('/');
        }

        return view('auth.login', ['invalid_credentials' => true]);
    }

    public function logout() {
        auth()->logout();

        return view('auth.login');
    }
}
