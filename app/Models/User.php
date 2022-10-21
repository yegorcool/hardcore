<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'city',
        'password',
        'height',
        'weight',
        'avatar',
        'hero_image',
        'gallery_images',
        'is_shown_on_welcome',
        'gallery_images',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_shown_on_welcome' => 'boolean',
        'gallery_images' => 'array',
    ];

    /**
     * @param string|array $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_array($role)) {
            return in_array($this->getRole(), $role);
        }
        return $role === $this->getRole();
    }

    /**
     * @param string $role
     * @return $this
     */
    public function setRole(string $role)
    {
        $this->setAttribute('role', $role);
        return $this;
    }
    /** @return string */
    public function getRole()
    {
        return $this->role;
    }

    public function games() {
        return $this->belongsToMany(Game::class, 'game_user', 'member_id', 'game_id');
    }
}
