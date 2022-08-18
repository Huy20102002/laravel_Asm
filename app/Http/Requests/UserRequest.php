<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|min:6',
            'email'=>'required|unique:users|email|min:6',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'birtday'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Vui lòng tối thiểu 6 kí tự',
            'email.required'=>'Vui lòng nhập email',
            'email.unique'=>'Email đã tôn tại',
            'email.email'=>'Vui lòng nhập đúng định dạng',
            'email.min'=>'Vui lòng tối thiểu 6 kí tự',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Vui lòng nhập đúng định dạng',
            'image.required'=>'Vui lòng nhập tên',
            'image.mimes'=>'Vui lòng nhập đúng định dạng(jpeg,png,jpg,git,svg)',
            'image.mimes'=>'Vui lòng nhập đúng định dạng(jpeg,png,jpg,git,svg)',
            'birtday.required'=>'Vui lòng chọn ngày sinh',
        ];
    }
}
