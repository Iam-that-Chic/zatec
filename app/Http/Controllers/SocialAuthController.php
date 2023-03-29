<?php

namespace App\Http\Controllers;

use App\Models\SocialAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function redirect()
    {
        //redirect
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
        // Handle user authentication and registration here
            $google_user = Socialite::driver('google')->user();
                $user = User::updateOrCreate([
                    'email' => $google_user->email,
                ], [
                    'google_id' => $google_user->user['id'],
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_token' => $google_user->token,
                    'google_refresh_token' => $google_user->refreshToken,
                ]);
            
                Auth::login($user);
            
                return redirect('/dashboard');
          
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Failed to login/Register '.$th);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
