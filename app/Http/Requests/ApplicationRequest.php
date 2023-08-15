<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'residence' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required'],
            'tet' => ['required'],
            'files' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
