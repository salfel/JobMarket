<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'residence' => ['required', 'min:3'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required', 'numeric', 'min_digits:10'],
            'application_letter' => ['required', 'min:24'],
            'files.*' => ['file', 'mimes:doxc,pdf,txt'],
        ];
    }

    public function authorize(): bool
    {
		return true;
    }
}
