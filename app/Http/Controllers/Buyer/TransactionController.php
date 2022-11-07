<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;

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
