<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
}
