<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $fillable =
        [
            'name',
            'email',
            'password',
        ];

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
