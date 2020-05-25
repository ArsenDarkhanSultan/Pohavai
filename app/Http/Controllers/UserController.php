<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

        $verify_token = Str::random(30);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'verify_token' => $verify_token,
        ]);

        $verifyUrl = route('verifyEmail',
            [
                'id' => $user->id,
                'secret' => $verify_token
            ]);

        Mail::to($user)->send(new VerifyEmail($user, $verifyUrl));

        Auth::login($user, isset($request['remember_me']));



        return redirect()->route('main');
    }

    public function verifyEmail($id, Request $request) {
        $user = User::find($id);
        if (!$user) redirect()->route('registerForm')->withErrors(['error' => 'User not found']);
        $secret = $request['secret'];

        if ($secret != $user->verify_token) return redirect()->route('registerForm')->withErrors(['error' => 'Invalid secret']);

        $user->verify_token = null;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('main')->with(['alert' => 'Вы успешно подтвердили электронную почту!']);
    }

    public function showLogin(Request $request) {
        return view('User.login');
    }

    public function edit() {
        return view('profile_edit');
    }

    public function update(Request $request) {
        $rules = [
            'avatar' => 'nullable|image',
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable'
        ];
        $this->validate($request, $rules);

        $user = Auth::user();

        if ($request['name']) {
            $user->name = $request['name'];
        }
        if ($request['password']) {
            $user->password = Hash::make($request['password']);
        }

        if ($request['email']) {
            $this->sendVerification($user);
        }

        $user->save();

        return redirect()->route('profile_show');
    }

    public function login(Request $request) {
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|max:255',
        ];

        $this->validate($request, $rules);

        if
        (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']], isset($request['remember_me']))) {
            return redirect()->back()->withErrors(['error' => trans('auth.failed')]);
        }

        return redirect()->route('main');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->route('main');
    }

    public function profile_show(Request $request){
        $user = Auth::user();
        return view('profile_show', ['user' => $user]);
    }

    public function sendVerification($user) {
        $verify_token = Str::random(30);
        $user->verify_token = $verify_token;
        $user->email_verified_at = null;
        $verifyUrl = route('verifyEmail',
            [
                'id' => $user->id,
                'secret' => $verify_token
            ]);

        Mail::to($user)->send(new VerifyEmail($user, $verifyUrl));

        $user->save();
    }

}
