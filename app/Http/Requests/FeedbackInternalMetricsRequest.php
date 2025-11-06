<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackInternalMetricsRequest extends FormRequest
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
            'fb_internal_is_show' => ['integer'],
            'fb_internal_is_answer' => ['integer'],
            'fb_internal_is_positive' => ['integer'],
            'fb_internal_is_negative' => ['integer'],
            'fb_gplay_is_show' => ['integer'],
        ];
    }
}
