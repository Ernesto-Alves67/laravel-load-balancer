<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Adjust this logic according to your application's authorization requirements
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email'],
            'social_id' => ['required', 'string', 'max:255'],
            'social' => ['required', 'string', 'max:255'],
            'web_id' => ['nullable', 'string'],
        ];
    }
}
