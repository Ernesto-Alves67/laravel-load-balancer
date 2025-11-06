<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserShowRequest extends FormRequest
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
            'first_name' => ['string'],
            'last_name' => ['string'],
            'bio' => ['string'],
            'show_me_distance_in' => ['string'],
            'show_orientation' => ['string'],
            'min_age' => ['string'],
            'max_age' => ['string'],
            'gender' => ['string'],
            'phone' => ['string'],
            'show_me_gender' => ['string'],
            'radius' => ['string'],
            'country_id' => ['string'],
            'job_title' => ['string'],
            'company' => ['string'],
            'rewind' => ['string'],
            'school_id' => ['string'],
            'dob' => ['string'],
            'gender_show' => ['string'],
            'hide_me' => ['string'],
            'hide_age' => ['string'],
            'website' => ['string'],
            'hide_location' => ['string'],
            'active' => ['string'],
            'email' => ['string'],
            'main_interest' => ['string'],
            'secondary_interest' => ['string'],
            'show_grid' => ['string'],
            'personality' => ['string'],
            'device_token' => ['string'],
            'ip' => ['string'],
            'device' => ['string'],
            'version' => ['string'],
            'lat' => ['string'],
            'long' => ['string'],
            'userPassions' => ['string'],
            'userSexualOrientations' => ['string'],
            'school' => ['string'],
            'userImages' => ['string'],
        ];
    }
}
