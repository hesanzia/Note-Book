<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{

    public function authorize()
    {
        return Gate::allows('admin');
    }

    public function rules()
    {
        return [
            'name'     => [
                'required',
            ],
            'volume' => [
                'required',
            ],
            'language' => [
                'required',
            ],
            'writer_id' => [
                'required',
            ],
            'publisher_id' => [
                'required',
            ],
            'translator_id' => [
                'required',
            ],
            'picture' => [
                'string',
            ],
            'link' => [
                'string',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام وارد نشده است!',
            'volume.required' => 'شماره جلد را وارد کنید!',
            'language.required' => 'زبان فیلفم وارد نشده است!',
            'writer_id.required' => 'نام نویسنده را انتخاب کنید!',
            'publisher_id.required' => 'نام انتشارات را انتخاب کنید!',
            'translator_id.required' => 'نام مترجم را انتخاب کنید!',
            'picture.string' => 'محل عکس را وارد کنید!',
            'link.string' => 'لینک فایل را وارد کنید!',
        ];
    }
}
