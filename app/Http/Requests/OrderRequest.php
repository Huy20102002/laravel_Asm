<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'email'=>'required|email',
            'address'=>'required|min:6',
            'country'=>'required',
            'phone'=>'required|min:10|max:11'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên',
            'name.min'=>'Vui lòng nhập tối thiểu 3 kí tự',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập đúng định dạng',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'address.min'=>'Vui lòng nhập tối thiểu 6 kí tự',
            'country.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.min'=>'Số điện thoại tối thiểu 10 số',
            'phone.max'=>'Số điện thoại tối đa 11 số'
        ];
    }
}
