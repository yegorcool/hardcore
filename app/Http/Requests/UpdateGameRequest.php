<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGameRequest extends FormRequest
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
        $fighters = User::query()
            ->where('deleted_at', '=', null)
            ->where('role', '=', 'fighter')
            ->get()
            ->pluck('id');

        return [
            'member_one_id' => ['required', 'numeric', Rule::in($fighters)],
            'member_two_id' => ['required', 'numeric', Rule::in($fighters), 'different:member_one_id'],
            'datetime' => ['required', 'date', 'after:today'],
            'city' => ['nullable', 'string', 'max:255'],
            'place' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'head_image' => ['required', 'mimes:jpeg,jpg,png,bmp'],
        ];
    }
}
