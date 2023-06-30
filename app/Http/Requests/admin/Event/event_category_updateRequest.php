<?php

namespace App\Http\Requests\admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class event_category_updateRequest extends FormRequest
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
            'tenDanhmuc'=>'required',
            'mota'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'tenDanhmuc.required' => 'Bạn chưa nhập tên danh mục',
            'mota.required'=>'Bạn chưa nhập mô tả'
        ];
    }
}
