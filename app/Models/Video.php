<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'buyer_id',
        'fighter_id',
        'title',
        'video_file',
        'status',
        'comment',
    ];

    /**
     * Get the buyer that made the transaction.
     */
    public function videoMaker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    /**
     * Get the buyer that made the transaction.
     */
    public function videoRecipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'fighter_id', 'id');
    }
}
