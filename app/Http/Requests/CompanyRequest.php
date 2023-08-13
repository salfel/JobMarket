<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CompanyRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:24'],
            'logo' => ['required', 'image'],
            'website' => ['required', 'url'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'region' => ['required', Rule::in(config('constants.regions'))],
            'location' => ['required', 'min:3'],
        ];
    }
}
