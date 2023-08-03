<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:24'],
            'logo' => $request->getMethod() != 'PATCH' ? ['required', 'image'] : ['required', 'string'],
            'website' => ['required', 'url'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'region' => ['required', Rule::in(config('constants.regions'))],
            'location' => ['required', 'min:3'],
        ];
    }
}
