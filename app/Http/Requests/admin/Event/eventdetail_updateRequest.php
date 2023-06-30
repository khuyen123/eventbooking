<?php

namespace App\Http\Requests\admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class eventdetail_updateRequest extends FormRequest
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
            'contact_phone_detail' => 'required|numeric|min:10',
            'contact_email_detail' => 'required|email',
            'contact_name_detail' => 'required',
            'start_time_detail' => 'required',
            'end_time_detail' => 'required',
            'detail_address' => 'required',
            'detail_locate' => 'required',
            'detail_maxtitket' => 'required',
            'detail_prince' => 'required',
            'detail_yearold' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'contact_phone_detail.required' => 'Bạn chưa nhập số điện thoại liên hệ',
            'contact_email_detail.required' => 'Bạn chưa nhập email liên hệ',
            'contact_email_detail.email' =>'Email sai định dạng',
            'contact_name_detail.required' => 'Bạn chưa nhập tên người liên hệ',
            'start_time_detail.required' => 'Bạn chưa nhập thời gian bắt đầu ',
            'end_time_detail.required' => 'Bạn chưa nhập thời gian kết thúc',
            'detail_address.required' => 'Bạn chưa nhập địa chỉ chi tiết',
            'detail_locate.required' => 'Bạn chưa nhập khu vực',
            'detail_maxtitket.required' => 'Bạn chưa nhập số vé tối đa',
            'detail_prince.required' => 'Bạn chưa nhập giá vé',
            'detail_yearold.required' => 'Bạn chưa nhập độ tuổi',
            'contact_phone_detail.numeric' => 'Số điện thoại sai định dạng',
            'contact_phone_detail.min' =>'Số điện thoại sai định dạng'
        
        ];
    }
}
