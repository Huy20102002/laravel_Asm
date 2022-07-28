<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|max:255|email',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email',
            'email.max'=>'Email không được quá 255 kí tự',
            'emai.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập password',
        ];
    }
}
