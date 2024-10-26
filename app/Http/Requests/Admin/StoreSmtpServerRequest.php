<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseFormRequest;
use App\Models\SmtpServer;
use Illuminate\Validation\Rule;

class StoreSmtpServerRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'transport' => [
                'required',
                'max:100',
                Rule::in('smtp'),
            ],
            'host' => [
                'required',
                'string',
            ],
            'port' => [
                'required',
                'integer',
                'min:1',
                'max:65535',
            ],
            'encryption' => [
                'required',
                'string',
                Rule::in(['tls', 'ssl', 'none']),
            ],
            'username' => [
                'required',
                'string',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'max:255',
            ],
            'timeout' => [
                'nullable',
                'integer',
                'min:1',
                'max:65535',
            ],
            'auth_mode' => [
                'required',
                'boolean',
            ],
            'active' => [
                'required',
                'boolean',
            ],
            'default' => [
                'required',
                'boolean',
            ],
        ];
    }
}
