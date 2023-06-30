<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class changeAVTRequest extends FormRequest
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
            'user_avt'=>'required',
            
            
        ];
    }
    public function messages()
    {
        return [
            'user_avt.required'=>'Bạn chưa chọn ảnh',
           
        ];
    }
}
