<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveAdminFunctionsRequest extends FormRequest
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
            'live_id' => 'sometimes|string',
            'start_live' => 'sometimes|string',
            'finish_live' => 'sometimes|string',
            'close_open_cam' => 'sometimes|string',
            'type' => 'sometimes|string',
            'chat_enabled' => 'sometimes|string',
            'mute_chat' => 'sometimes|string',
            'user_to_mute' => 'sometimes|string',
            'user_to_block' => 'sometimes|string',
            'block' => 'sometimes|string',
            'other_user_id' => 'sometimes|string',
            'description' => 'sometimes|string',
        ];
    }
}
