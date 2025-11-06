<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterMetricRequest extends FormRequest
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
            'user_id' => 'string|required',
            'lat' => 'numeric',
            'long' => 'numeric',
            'filters' => 'json',
            'min_age' => 'integer',
            'max_age' => 'integer',
            'radius' => 'integer',
            'distance_beyond' => 'string',
            'show_me_gender' => 'string',
        ];
    }
}
