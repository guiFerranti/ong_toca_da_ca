<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgurToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'access_token',
        'refresh_token',
        'expires_at',
        'user_id'
    ];

    protected $casts = [
        'expires_at' => 'datetime'
    ];

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}
