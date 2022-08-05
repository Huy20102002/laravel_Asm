<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    //
    public function getLoginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginGoogleCallBack()
    {
        $googleUser = Socialite::driver('google')->user();
        if($googleUser){

        }
    }
    public function getLoginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginFacebookCallBack()
    {
        $googleUser = Socialite::driver('facebook')->user();
        dd($googleUser);
    }
}
