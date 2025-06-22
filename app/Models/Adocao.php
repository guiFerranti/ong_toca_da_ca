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

    public static function getFieldLabels()
    {
        return [
            'nome' => 'Nome completo',
            'idade' => 'Idade',
            'profissao' => 'Profissão',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
            'endereco' => 'Endereço completo',
            'tipo_moradia' => 'Tipo de moradia',
            'tipo_imovel' => 'Tipo de imóvel',
            'permite_pet' => 'Proprietário permite animais',
            'qtd_pessoas' => 'Quantidade de pessoas na casa',
            'todos_aceitam' => 'Todos concordam com a adoção',
            'tem_criancas' => 'Tem crianças',
            'tem_animais' => 'Possui outros animais',
            'animais_info' => 'Informações sobre outros animais',
            'todos_vacinados' => 'Animais são vacinados/castrados',
            'local_dia' => 'Local durante o dia',
            'local_noite' => 'Local durante a noite',
            'acesso_interno' => 'Acesso ao interior da casa',
            'ciente_longevidade' => 'Ciente da longevidade do pet',
            'cond_financeira' => 'Condições financeiras',
            'ja_abandonou' => 'Já abandonou/doou um animal',
            'motivo_abandono' => 'Motivo do abandono/doação',
            'aceita_termo' => 'Aceita o termo de responsabilidade',
        ];
    }

    public static function getFieldGroups()
    {
        return [
            'Informações Pessoais' => [
                'nome', 'idade', 'profissao', 'telefone', 'email', 'endereco',
                'tipo_moradia', 'tipo_imovel', 'permite_pet'
            ],
            'Sobre o Lar' => [
                'qtd_pessoas', 'todos_aceitam', 'tem_criancas', 'tem_animais',
                'animais_info', 'todos_vacinados', 'local_dia', 'local_noite', 'acesso_interno'
            ],
            'Compromisso' => [
                'ciente_longevidade', 'cond_financeira', 'ja_abandonou',
                'motivo_abandono', 'aceita_termo'
            ]
        ];
    }

    public function scopeStatusOrder($query)
    {
        return $query->orderByRaw("FIELD(status, 'Não lido', 'Lido', 'Concluído')");
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'id_pet');
    }
}
