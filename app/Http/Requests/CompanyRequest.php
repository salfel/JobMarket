<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:24'],
            'logo' => ['required', 'image'],
            'website' => ['required', 'url'],
            'phone' => ['required', 'integer'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'region' => ['required', Rule::in(config('constants.regions'))],
            'location' => ['required', 'min:3'],
        ];
    }
}
