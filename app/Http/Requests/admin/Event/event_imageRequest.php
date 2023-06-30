<?php

namespace App\Http\Requests\admin\Event;

use Illuminate\Foundation\Http\FormRequest;

class event_imageRequest extends FormRequest
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
            'event_image'=>'required|image'

        ];
    }
    public function messages()
    {
        return [
            'event_image.required' => 'Bạn chưa tải ảnh',
            'event_image.image' => 'Tệp sai định dạng'
        ];
    }
}
