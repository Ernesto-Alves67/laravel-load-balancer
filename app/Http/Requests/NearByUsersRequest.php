<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NearByUsersRequest extends FormRequest
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
            'lat' => ['string'],
            'long' => ['string'],
            'distance_beyond' => ['string'],
            'interest' => ['string'],
            'passions' => ['string'],
            'bio' => ['string'],
            'show_me_gender' => ['string'],
            'toExclude' => ['string'],
        ];
    }
}
