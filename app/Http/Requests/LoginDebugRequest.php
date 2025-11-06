<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginDebugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'email' => ['string', 'nullable', 'max:255'],
            'social_id' => ['string', 'required', 'max:255'],
        ];
    }
}
