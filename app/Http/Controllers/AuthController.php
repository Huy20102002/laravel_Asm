<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        if ($googleUser) {
            // kiểm tra xem tài khoản đã tồn tại hay k
            $user = User::where('email', $googleUser->email)->first();
            // Nếu nếu có thì cho vào
            if ($user) {
                Auth::login($user); // không cần check password vẫn cho đăng nhập vào
                return redirect()->route('home');
            }
            $newUser = new User();
            $newUser->name = $googleUser->name;
            $newUser->email = $googleUser->user['email'];
            $newUser->image = $googleUser->user['picture'];
            $newUser->status = 1;
            $newUser->role = 1;
            $newUser->phone = 0;
            $newUser->password = Hash::make(0);
            $newUser->save();
            return redirect()->route('auth.login');
        }
    }
    public function getLoginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginFacebookCallBack()
    {
        $faceBookUser = Socialite::driver('facebook')->user();
        dd($faceBookUser);
    }
    public function profile()
    {
        return view('client.users.profile');
    }
}
