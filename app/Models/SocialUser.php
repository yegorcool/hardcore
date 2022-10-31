<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    use HasFactory;

    protected $table = 'social_user';

    protected $casts = [
        'user_id' => 'int',
        'social_id' => 'int',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'social_id',
        'link',
    ];
}
