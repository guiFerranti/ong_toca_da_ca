<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apadrinhamento extends Model
{
    use SoftDeletes;

    protected $table = 'apadrinhamentos';
    protected $fillable = [
        'nome',
        'nascimento',
        'cpf',
        'telefone',
        'email',
        'endereco',
        'tipo_pet',
        'nome_pet',
        'tipo_apadrinhamento',
        'contribuicao',
        'frequencia',
        'visita_regular',
        'receber_atualizacoes',
        'aceita_termos',
        'id_pet',
        'status'
    ];

    public function scopeStatusOrder($query)
    {
        return $query->orderByRaw("FIELD(status, 'Não lido', 'Lido', 'Concluído')");
    }
}
