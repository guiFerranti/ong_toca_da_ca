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
        'idade',
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

    public static function getFieldLabels()
    {
        return [
            'nome' => 'Nome completo',
            'idade' => 'Idade',
            'cpf' => 'CPF',
            'telefone' => 'Telefone',
            'email' => 'E-mail',
            'endereco' => 'Endereço completo',
            'tipo_pet' => 'Tipo de pet',
            'nome_pet' => 'Nome do pet',
            'tipo_apadrinhamento' => 'Tipo de apadrinhamento',
            'contribuicao' => 'Valor ou tipo de contribuição',
            'frequencia' => 'Frequência',
            'visita_regular' => 'Disposto a visitar o pet',
            'receber_atualizacoes' => 'Deseja receber atualizações',
            'aceita_termos' => 'Aceita o termo de compromisso',
        ];
    }

    public static function getFieldGroups()
    {
        return [
            'Informações Pessoais' => [
                'nome', 'idade', 'cpf', 'telefone', 'email', 'endereco'
            ],
            'Sobre o Apadrinhamento' => [
                'tipo_pet', 'nome_pet', 'tipo_apadrinhamento', 'contribuicao',
                'frequencia', 'visita_regular', 'receber_atualizacoes', 'aceita_termos'
            ]
        ];
    }

    public function scopeStatusOrder($query)
    {
        return $query->orderByRaw("FIELD(status, 'Não lido', 'Lido', 'Concluído')");
    }
}
