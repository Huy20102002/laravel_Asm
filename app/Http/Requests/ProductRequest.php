<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required|integer',
            'image'=>'required',
            'overview'=>'min:5',
            'description'=>'required|min:5',
            'quantity'=>'required|numeric',
            'status'=>'required',
            'category_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> "Vui lòng nhập tên sản phẩm",
            'price.required'=>'Vui lòng nhập giá sản phẩm',
            'price.integer'=>'Giá tiền phải là chữ số',
            'image.required'=>'Vui lòng nhập ảnh',
            'overview.min'=>'Vui lòng nhập tối thiểu 6 chữ số',
            'description.required'=>'Vui lòng nhập mô tả',
            'description.min'=>'Mô tả phải tối thiểu 5 chữ số',
            'quantity.required'=>'Vui lòng nhập số lượng',

            'quantity.numeric'=>'Số lượng phải là số',
            'status'=>'Vui lòng chọn status',
            'category_id'=>'Vui lòng chọn danh mục'
        ];
    }
}
