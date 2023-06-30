<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class titketCreateRequest extends FormRequest
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
          'ten_nguoidat' => 'required',
          'sdt_nguoidat' =>'required',
          'email_nguoidat' =>'required|email',
          'soCho'=>'required'
        ];
    }
    public function messages()
    {
        return [  
        'ten_nguoidat.required'=>'Bạn chưa nhập Tên',
        'sdt_nguoidat.required'=>"Bạn chưa nhập số điện thoại",
        'email_nguoidat.required'=>"Bạn chưa nhập email",
        'soCho.required'=>"Bạn chưa nhập số lượng vé",
        'email_nguoidat.email'=>"Email sai định dạng"
        ];
    }
}
