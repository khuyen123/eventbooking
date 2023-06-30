<?php

namespace App\Http\Requests\admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class titketsearchRequest extends FormRequest
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
            'titket_id'=>'required|min:6|max:6'
        ];
    }
    public function messages()
    {
        return [
            'titket_id.required' =>'Bạn chưa nhập mã số đặt vé',
            'titket_id.min'=>'Định dạng mã số chưa đúng',
            'titket_id.max'=>'Định dạng mã số chưa đúng'
        ];
    }
}
