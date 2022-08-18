<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index(){
        return view('client.contact.index');
    }
    public function store(Request $request){
        $to_email = $request->email;
        $content = 'Cảm ơn bạn đã liên hệ với chúng tôi ! Đây là email tự động sẽ phản hồi lại sau 24h';
        $data = [
            'subject'=>"Xin chào $request->name  Cảm ơn bạn đã liên hệ với chúng tôi",
            'name'=>$request->name,
            'email'=>$request->email,
            'content'=>$content
        ];
        Mail::to($to_email)->send(new SendMail($data)); 
        return redirect()->back();
    }
}
