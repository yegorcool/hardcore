<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'games';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_one_id',
        'member_two_id',
        'datetime',
        'place',
        'city',
        'description',
        'head_image',
    ];

    protected $casts = [
        'member_one_id' => 'int',
        'member_two_id' => 'int',
        'datetime' => 'datetime:Y-m-d H:i',
    ];

    public function members() {
        return $this->belongsToMany(User::class, 'game_user', 'game_id', 'member_id')
            ->withPivot([
                'id',
                'game_id',
                'member_id',
            ])->withTimestamps();
    }
}
