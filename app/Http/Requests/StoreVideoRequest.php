<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVideoRequest extends FormRequest
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
        $buyers = User::query()
            ->where('deleted_at', '=', null)
            ->where('role', '=', 'buyer')
            ->get()
            ->pluck('id');

        $fighters = User::query()
            ->where('deleted_at', '=', null)
            ->where('role', '=', 'fighter')
            ->get()
            ->pluck('id');

//        @todo тоже сделать какой-то список
        $status = ['новое', 'отправлено', 'возвращено'];


        return [
            'buyer_id' => ['required', 'numeric', Rule::in($buyers)],
            'fighter_id' => ['required', 'numeric', Rule::in($fighters)],
            'title' => ['required', 'string', 'max:255'],
            'status'  => ['required', 'string', Rule::in($status)],
            'comment' => ['nullable', 'string', 'max:255'],
            'video_file' => ['required', 'mimes:mp4'],
        ];
    }
}
