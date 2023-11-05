<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'description' => ['nullable'],
            'phone' => ['nullable'],
            'sendblue_api' => ['nullable'],
            'api_token' => ['nullable'],
            'owner_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
