<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Userlogs;
class Auth extends Controller
{
    public static function login(Request $request){
        validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if(auth()->attempt($request->only(['email', 'password']))){
            $user = auth()->user();
            session(['info' => [
                'name' => $user->name,
                'email' => $user->email,
                'department' => $user->department
            ]]);

            Userlogs::create([
                'userlog_account' => $user->email
            ]);
            return redirect('/user/dtr-generate');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Username/Password.']);
    }

    public static function register(Request $request){
        User::create([
            'name' => $request->inp_name,
            'email' => $request->inp_username . '@TAGOLOAN.LGU',
            'password' => Hash::make($request->inp_password),
            'department' => $request->inp_department
        ]);
        return redirect('/user/account-new?s');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }
}
