<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RewardConsumableRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:user,id',
            'type' => 'required|string|in:superlike,boost',
            'amount' => 'required|integer|min:1',
        ];
    }
}
