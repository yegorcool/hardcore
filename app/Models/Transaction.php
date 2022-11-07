<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'datetime',
        'buyer_id',
        'fighter_id',
        'topic',
        'amount',
        'status',
        'comment',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'datetime' => 'datetime',
        'amount' => 'integer',
    ];

    /**
     * Get the buyer that made the transaction.
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    /**
     * Get the buyer that made the transaction.
     */
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'fighter_id', 'id');
    }
}
