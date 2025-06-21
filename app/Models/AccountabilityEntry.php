<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountabilityEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'payment_date',
        'amount',
        'description',
        'image_url',
        'status',
        'user_id'
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
