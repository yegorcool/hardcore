<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Role\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
        $producers = User::query()
            ->whereNull('deleted_at')
            ->where('role', '=', 'producer')
            ->pluck('id')->toArray();

        return [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', Rule::in($roles)],
            'producer_id' => ['required_if:role,fighter', 'nullable', 'numeric', Rule::in($producers)],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'description' => ['nullable', 'string'],
            'avatar' => ['nullable', 'mimes:jpeg,jpg,png,bmp'],
        ];
    }
}
