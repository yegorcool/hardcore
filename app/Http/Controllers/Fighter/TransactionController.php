<?php

namespace App\Http\Controllers\Fighter;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
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
            ->where('fighter_id', '=', auth()->id())
            ->with('buyer')
            ->paginate(30);

        return response()->view('fighter.transactions.index', [
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
            ->with('buyer')
            ->first();
        return response()->view('fighter.transactions.show', [
            'transaction' => $transaction,
        ]);
    }
}
