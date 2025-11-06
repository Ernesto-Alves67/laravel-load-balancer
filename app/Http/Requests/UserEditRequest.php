<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'show_orientation' => ['integer'],
            'min_age' => ['integer'],
            'max_age' => ['integer'],
            'gender' => ['string'],
            'phone' => ['string'],
            'show_me_gender' => ['string'],
            'radius' => ['integer'],
            'country_id' => ['integer'],
            'remaining_swipes' => ['integer'],
            'job_title' => ['string'],
            'company' => ['string'],
            'school_id' => ['integer'],
            'dob' => ['date'],
            'gender_show' => ['integer'],
            'hide_me' => ['integer'],
            'hide_age' => ['integer'],
            'website' => ['string'],
            'hide_location' => ['integer'],
            'active' => ['integer'],
            'total_like_per_day' => ['integer'],
            'email' => ['email'],
            'main_interest' => ['integer'],
            'secondary_interest' => ['integer'],
            'show_grid' => ['integer'],
            'personality' => ['string'],
            'device_token' => ['string'],
            'ip' => ['string'],
            'last_seen' => ['date'],
            'device' => ['string'],
            'version' => ['string'],
            'lat' => ['string'],
            'long' => ['string'],
            'user_passion' => ['array'],
            'user_passion.*' => ['string'],
            'user_sexual_orientation' => ['array'],
            'user_sexual_orientation.*' => ['integer'],
        ];
    }
}
