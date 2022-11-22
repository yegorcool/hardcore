<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProducerFighter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'producer_fighter';

    protected $casts = [
        'producer_id' => 'int',
        'fighter_id' => 'int',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fighter_id',
        'fighter_id',
        'comment',
    ];
}
