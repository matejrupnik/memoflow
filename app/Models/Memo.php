<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function hasUser($user) {
        return $this->users->contains($user);
    }
}
