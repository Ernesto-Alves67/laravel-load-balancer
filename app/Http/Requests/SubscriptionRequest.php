<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'user_id' => 'required|string',
            'package' => 'required|string',
            'amount' => 'required|string',
            'duration' => 'required|string',
            'duration_unit' => 'required|in:week,month',
            'gpayid' => 'required|string',
            'transaction_id' => 'required|string',
            'usrprice' => 'required|string',
        ];
    }
}
