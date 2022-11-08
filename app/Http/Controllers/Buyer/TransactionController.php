<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::query()
            ->where('buyer_id', '=', auth()->id())
            ->with('recipient')
            ->get();

        return response()->view('buyer.transactions.index', [
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->get('recipient')) {
            return redirect()->back()->withErrors(['message' => 'Ошибка платежа. Не указан получатель']);
        } else {
            $recipient_id = $request->get('recipient');
            $recipient = User::query()
                ->where('id', '=', $recipient_id)
                ->first();
        }
        $topic = $request->get('topic') ?: 'Поддержать';

        $buyer = auth()->user();
        return response()->view('buyer.transactions.create', [
            'buyer' => $buyer,
            'recipient' => $recipient,
            'topic' => $topic,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create([
            'datetime' => now(),
            'buyer_id' => $request->buyer_id,
            'fighter_id' => $request->fighter_id,
            'topic' => $request->topic,
            'amount' => $request->amount,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);
        return response()->redirectTo(route('buyer.transaction', $transaction))->withSuccess(['message' => 'Спасибо за ваш платеж! ']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {

        $transaction = Transaction::query()
            ->where('id', '=', $transaction->id)
            ->with('recipient')
            ->first();
        return response()->view('buyer.transactions.show', [
            'transaction' => $transaction,
        ]);
    }
}
