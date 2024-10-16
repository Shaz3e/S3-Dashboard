<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\BaseFormRequest;

class StoreProfileRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mobile' => [
                'required',
                'string',
                config('validation.phone')
            ],
            'whatsapp' => [
                'nullable',
                'string',
                config('validation.phone'),
            ],
            'skype' => [
                'nullable',
                'string',
                config('validation.skype'),
            ],
            'country' => [
                'nullable',
                'string',
                'max:100',
            ],
            'state' => [
                'nullable',
                'string',
                'max:100',
            ],
            'city' => [
                'nullable',
                'string',
                'max:100',
            ],
        ];
    }
}
