<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumablePurchaseRequest extends FormRequest
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
            'user_id' => ['required', 'integer'],
            'transaction_id' => ['required', 'string'],
            'gpay_id' => ['required', 'string'],
            'price_paid' => ['required', 'string'],
            'no_of_superlike' => ['integer'],
            'no_of_boost' => ['integer'],
        ];
    }
}
