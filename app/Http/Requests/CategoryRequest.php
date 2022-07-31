<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    // public function checkStatus(){
   
    //         return $this->input('status') == 0 || $this->input('status') !== 1;
        
    // }
    public function rules()
    {

        return [
            'name' => 'required',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'status.required' => 'Vui lòng chọn trạng thái'
        ];
    }
}
