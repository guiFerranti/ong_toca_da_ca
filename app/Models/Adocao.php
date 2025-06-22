<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adocao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'adocoes';

    protected $fillable = [
        'id_pet',

        'nome',
        'idade',
        'profissao',
        'telefone',
        'email',
        'endereco',
        'tipo_moradia',
        'tipo_imovel',
        'permite_pet',

        'tipo_pet',
        'nome_pet',

        'qt_pessoas',
        'todos_aceitam',
        'tem_criancas',
        'tem_animais',
        'animais_info',
        'todos_vacinados',
        'local_dia',
        'local_noite',
        'acesso_interno',

        'ciente_longevidade',
        'cond_financeira',
        'ja_abandonou',
        'motivo_abandono',
        'aceita_termo',
        'status',
    ];


    public function scopeStatusOrder($query)
    {
        return $query->orderByRaw("FIELD(status, 'Não lido', 'Lido', 'Concluído')");
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'id_pet');
    }
}
