<?php

namespace App\Http\Requests\admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class pageInforCreateRequest extends FormRequest
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
            'phone_page' => 'required|numeric|min:10',
            'email_page' => 'required|email',
            'address_page' => 'required',
            'content_page' => 'required',
            'title_page' => 'required',
            'address_page' => 'required',
            'title_aboutus' => 'required',
            'content_aboutus' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'phone_page.required' => 'Bạn chưa nhập số điện thoại',
            'email_page.required' => 'Bạn chưa nhập email',
            'email_page.email' =>'Email sai định dạng',
            'content_page.required' => 'Bạn chưa nhập Nội dung',
            'title_page.required' => 'Bạn chưa nhập Tiêu đề',
            'address_page.required' => 'Bạn chưa nhập địa chỉ',
            'title_aboutus.required' => 'Bạn chưa nhập Tiêu đề',
            'content_aboutus.required' => 'Bạn chưa nhập Nội dung',
            'phone_page.numeric' => 'Số điện thoại sai định dạng',
            'phone_page.min' =>'Số điện thoại sai định dạng'
        
        ];
    }
}
