<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $verifyUrl = URL::temporarySignedRoute(
            'verifyEmail',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 15)),
            [
                'id' => $user->id,
                'secret' => sha1($user->email.$user->password)
            ]
        );

        Mail::to($user)->send(new VerifyEmail($user, $verifyUrl));

        Auth::login($user, isset($request['remember_me']));



        return redirect()->route('main');
    }

    public function verifyEmail($id, $secret, Request $request) {
        dd($request->all());
        if (!$request->hasValidSignature()) {
            return redirect()->route('registerForm')->withErrors(['error' => 'Incorrect signature']);
        }

        $user = User::find($id);
        if (!$user) redirect()->route('registerForm')->withErrors(['error' => 'User not found']);

        $secret_check = sha1($user->email, $user->password);

        if ($secret_check != $secret) return redirect()->route('registerForm')->withErrors(['error' => 'Invalid secret']);

        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('main');

    }

    public function showLogin(Request $request) {
        return view('User.login');
    }

    public function edit() {
        return view('profile_edit');
    }

    public function update(Request $request) {
        $rules = [
            'avatar' => 'image',
            'name' => 'string',
            'email' => 'email',
            'password' => 'password'
        ];
        $this->validate($request, $rules);

        $user = Auth::user();

        $user->fill($request->all());

        if ($request['email']) {

        }
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

}
