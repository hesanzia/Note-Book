<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreWriterRequest extends FormRequest
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
            'nationality'     => [
                'required',
            ],
            'description'     => [
                'required',
            ],
            'profile'     => [
                'required',
            ],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام وارد نشده است!',
            'nationality.required' => 'ملیت را وارد کنید!',
            'description.required' => 'این فیلد را پر کنید!',
            'profile.required' => 'محل عکس پروفایل را وارد کنید!',
        ];
    }
}
