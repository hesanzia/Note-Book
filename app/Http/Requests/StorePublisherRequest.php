<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePublisherRequest extends FormRequest
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

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام وارد نشده است!',
        ];
    }
}
