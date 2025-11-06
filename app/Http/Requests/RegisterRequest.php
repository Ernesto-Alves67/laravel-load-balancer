<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class RegisterRequest extends FormRequest
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
            'social' => ['string', 'required', 'max:255'],
            'social_id' => ['string', 'required', 'max:255'],
            'school_id' => ['integer', 'required'],
            'email' => ['string', 'required', 'max:255'],
            'phone' => ['string', 'nullable', 'max:255'],
            'dob' => ['string', 'required', 'max:255'],
            'first_name' => ['string', 'required', 'max:255'],
            'last_name' => ['string', 'nullable', 'max:255'],
            'username' => ['string', 'required', 'max:255'],
            'gender' => ['string', 'required', 'max:255'],
            'gender_show' => ['integer', 'required'],
            'show_me_gender' => ['string', 'required', 'max:255'],
            'main_interest' => ['integer', 'nullable'],
            'secondary_interest' => ['integer', 'nullable'],
            'user_sexual_orientation' => ['array', 'nullable'],
            'show_orientation' => ['integer', 'nullable'],
            'user_passion' => ['array', 'nullable'],
            'utm_source' => ['string', 'required', 'max:255'],
            'utm_medium' => ['string', 'required', 'max:255'],
            'utm_campaign' => ['string', 'required', 'max:255'],
        ];
    }

    /**
     * Sobrescreve **somente** para esta Request
     * a forma como erros de validação são retornados.
     */
    protected function failedValidation(Validator $validator): void
    {

        $errors = $validator->errors()->all();
        Log::error('Validation failed', ['errors' => $errors]);
        $genericError = 'Erro de validação.';
        $payload = [
            'success' => false,
            'message' => 'Dados inválidos ou incompletos.',
            'errors' => $genericError,
        ];

        throw new HttpResponseException(
            response()->json($payload, 422)
        );
    }
}
