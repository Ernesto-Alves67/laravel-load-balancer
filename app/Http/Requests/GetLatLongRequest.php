<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetLatLongRequest extends FormRequest
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
            'lat' => 'string',
            'long' => 'string',
            'interest' => 'string',
            'bio' => 'string',
            'passions' => 'string',
            'show_me_gender' => 'string',
            'current_radius' => 'string',
            'previous_radius' => 'string',
        ];
    }
}
