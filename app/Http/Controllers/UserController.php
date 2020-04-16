<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegister(Request $request) {
        return view('User.register');
    }

    public function register(Request $request) {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4|max:255'
        ];
        $this->validate($request, $rules);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);


        return redirect()->route('main');
    }

    public function showLogin(Request $request) {
        return view('User.login');
    }

    public function login(Request $request) {
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|max:255',
        ];

        $this->validate($request, $rules);

        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->back()->withErrors(['error' => trans('auth.failed')]);
        }

        return redirect()->route('main');
    }

}
