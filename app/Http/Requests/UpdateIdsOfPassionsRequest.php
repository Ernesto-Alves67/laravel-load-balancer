<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIdsOfPassionsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'edit' => 'nullable|bool',
            'passions' => 'required|array', // Verifica se passions é um array
            'passions.*' => 'required|string', // Verifica se cada objeto no array passions tem um campo title que é uma string requerida
        ];
        // return[];
    }
}
