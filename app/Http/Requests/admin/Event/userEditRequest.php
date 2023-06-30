<?php

namespace App\Http\Requests\admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class userEditRequest extends FormRequest
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
            'ngaySinh'=>'required',
            'diachi'=>'required',
            'sdt'=>'required|numeric|min:10',
            'email'=>'required|email',
            'id_xaphuong'=>'required'
        ];
    }
    public function messages()
    {
        return [
           'ngaySinh.required'=>'Bạn chưa chọn ngày sinh',
           'diachi.required'=>'Bạn chưa nhập địa chỉ chi tiết',
           'sdt.required'=>'Bạn chưa nhập số điện thoại',
           'email.required'=>'Bạn chưa nhập Email',
           'id_xaphuong'=>'Bạn chưa chọn đúng địa chỉ',
           'sdt.numeric'=>'Số điện thoại sai định dạng',
           'sdt.min'=>'Số điện thoại sai định dạng',
           'email.email'=>'Email sai định dạng'
        ];
    }
}
