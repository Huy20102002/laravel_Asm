<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function login(LoginRequest $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->first();
        $status = isset($user->status) ? $user->status : 0;
        if($status==1){
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                $request->session()->regenerate();
                return redirect()->route('home');   
            }else{
                return redirect()->route('auth.login')->with('status','Thông tin không chính xác');        
            }
        }else{
            return redirect()->route('auth.login')->with('status','Tài khoản không xác định');        

        }
     
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
