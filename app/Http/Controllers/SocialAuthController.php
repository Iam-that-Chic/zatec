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
    public function redirect()
    {
        //redirect
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            //code...
            $google_user = Socialite::driver('google')->user();
            dd($google_user);
                $user = User::updateOrCreate([
                    'google_id' => $google_user->getId(),
                ], [
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_token' => $google_user->token,
                    'google_refresh_token' => $google_user->refreshToken,
                ]);
            
                Auth::login($user);
            
                return redirect('/dashboard');
          
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th['message']['code']);
            return redirect()->back()->withErrors('Failed to login/Register '.$th);
        }
    }
}
