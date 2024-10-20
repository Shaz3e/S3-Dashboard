<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:150',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->client)
            ],
            'password' => [
                $this->isMethod('put') ? 'nullable' : 'required',
                'string',
                'min:8',
                'max:65',
            ],
            'active' => [
                $this->isMethod('put') ? 'nullable' : 'required',
                'boolean',
            ],
            'email_verified_at' => [
                $this->isMethod('put') ? 'nullable' : 'required',
                'boolean',
            ],
        ];
    }
}
