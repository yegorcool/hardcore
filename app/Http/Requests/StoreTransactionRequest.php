<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
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

//        @todo сделать какой-то список
        $topics = ['Победа', 'День рождения', 'Поддержать'];
//        @todo тоже сделать какой-то список
        $status = ['новый', 'в процессе', 'оплачен', 'возвращен'];


        return [
//            'datetime' => ['required', 'date'],
            'buyer_id' => ['required', 'numeric', Rule::in($buyers)],
            'fighter_id' => ['required', 'numeric', Rule::in($fighters)],
            'topic' => ['required', 'string', 'max:255', Rule::in($topics)],
            'amount' => ['required', 'numeric'],
            'status'  => ['required', 'string', Rule::in($status)],
            'comment' => ['nullable', 'string'],
        ];
    }
}
