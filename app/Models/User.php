<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    public function memos(): BelongsToMany {
        return $this->belongsToMany(Memo::class);
    }

    public function hasMemos(): bool {
        return $this->memos()->exists();
    }

    public function usersOf() {
        return $this->belongsToMany(User::class, 'user_user', 'user_1', 'user_2');
    }

    public function usersFrom() {
        return $this->belongsToMany(User::class, 'user_user', 'user_1', 'user_2');
    }

    public function mergeUsers() {
        return $this->usersOf->merge($this->usersFrom);
    }
}
