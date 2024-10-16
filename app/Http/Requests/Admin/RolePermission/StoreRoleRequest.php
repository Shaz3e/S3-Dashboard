<?php

namespace App\Http\Requests\Admin\RolePermission;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends BaseFormRequest
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
                $this->isMethod('put') && !$this->has('syncPermissions') ? 'required' : 'nullable',
                'string',
                'min:3',
                'max:150',
                Rule::unique('roles', 'name')->ignore($this->role),
            ],
            'permissions' => [
                'array',
            ]
        ];
    }
}
