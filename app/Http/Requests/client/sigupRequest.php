<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class sigupRequest extends FormRequest
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
            'username'=>'required',
            'password'=>'required',
            'repeat_password' => 'required | same:password',
            'email' => 'required|email',

        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Bạn chưa nhập tên đăng nhập hoặc email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'repeat_password.required'=>'Bạn chưa nhập lại mật khẩu',
            'email.required'=>'Bạn chưa nhập Email',
            'repeat_password.same' => 'Mật khẩu nhập lại chưa đúng',
            'hoten.required' => 'Bạn chưa nhập họ tên',
            'email.email'=>'Email sai định dạng'
            
        ];
    }
}
