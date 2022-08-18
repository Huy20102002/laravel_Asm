<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'repassword'=>'required|same:password|min:6'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên người dùng',
            'name.min'=>'Vui lòng nhập tối thiểu 3 kí tự',
            'email.required'=>'Vui lòng nhập email',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập mật khẩu tối thiểu 6 ký tự',
            'repassword.required'=>'Vui lòng nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu không giống nhau',
        ];
    }
}
