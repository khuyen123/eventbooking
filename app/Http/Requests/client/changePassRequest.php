<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class changePassRequest extends FormRequest
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
            'newpass_token'=>'required',
            'newpass' => 'required',
            'newpass_repeat'=>'required|same:newpass'
            
        ];
    }
    public function messages()
    {
        return [
            'newpass_repeat.required'=>'Bạn chưa nhập lại mật khẩu',
            'newpass.required' => 'Bạn chưa nhập mật khẩu',
            'newpass_token.required'=> 'Bạn chưa nhập mã xác nhận',
            'newpass_repeat.same'=>'Mật khẩu nhập lại không đúng'
        ];
    }
}
