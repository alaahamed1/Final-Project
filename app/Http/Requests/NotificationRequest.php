<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->user_type != 'customer';
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'message' => 'required|string',
            'action_url' => 'required|string',
            'type' => 'required|string|in:info,warning,danger,success',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
