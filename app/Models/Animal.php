<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'animals';
    protected $fillable = [
        'is_active',
        'tipo',
        'nome',
        'data_nascimento',
        'idade',
        'sexo',
        'img_perfil',
        'testado_fiv_felv',
        'is_castrado',
        'small_description',
        'description',
    ];


    public function imagens()
    {
        return $this->hasMany(AnimalImage::class);
    }

}
