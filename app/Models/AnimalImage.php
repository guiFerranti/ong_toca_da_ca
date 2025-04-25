<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalImage extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'animal_images';
    protected $fillable =
        [
            'animal_id',
            'path',
        ];
}
