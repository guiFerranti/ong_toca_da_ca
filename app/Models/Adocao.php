<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    use HasFactory;

    protected $table = 'adocoes';

    protected $fillable = [
        'id_pet',

        'nome',
        'idade',
        'profissao',
        'telefone',
        'email',
        'endereco',
        'tipo_residencia',
        'imovel_proprio',
        'permite_animais',

        'tipo_pet',
        'nome_pet',

        'qtd_pessoas',
        'todos_de_acordo',
        'tem_criancas',
        'tem_animais',
        'quais_animais',
        'vacinados_castrados',
        'onde_dia',
        'onde_noite',
        'acesso_interior',

        'consciencia_longevidade',
        'condicao_financeira',
        'ja_abandonou',
        'motivo_abandono',
        'aceita_termos',
    ];
}
