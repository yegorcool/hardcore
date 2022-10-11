<?php

namespace App\Http\Requests;

use App\Role\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFighterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $roles = array_keys(UserRole::getRoleList());

        return [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', Rule::in($roles)],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'сшен' => ['nullable', 'string', 'max:255'],
            'height' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
        ];
    }
}
