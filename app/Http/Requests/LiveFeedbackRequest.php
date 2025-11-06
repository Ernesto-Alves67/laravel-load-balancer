<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveFeedbackRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['filled', 'numeric'],
            'live_id' => ['filled', 'numeric'],
            'rating' => ['integer', 'numeric', 'min:1', 'max:5', 'filled'],
            'response' => ['string', 'nullable'],
            'options' => ['array', 'nullable'],
        ];
    }
}
