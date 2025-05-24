<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adocao;

class AdocaoController extends Controller
{
    public function create($id_pet)
    {
        if (!$id_pet) {
            abort(400, 'ID do pet é obrigatório.');
        }

        return view('publics.adocao.create', compact('id_pet'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pet' => 'required|integer|exists:animals,id',

            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'profissao' => 'nullable|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'endereco' => 'required|string|max:255',
            'tipo_residencia' => 'required|in:casa,apartamento,sitio',
            'imovel_proprio' => 'required|boolean',
            'permite_animais' => 'nullable|boolean',

            'tipo_pet' => 'required|in:cao,gato',
            'nome_pet' => 'nullable|string|max:255',

            'qtd_pessoas' => 'nullable|integer',
            'todos_de_acordo' => 'nullable|boolean',
            'tem_criancas' => 'nullable|boolean',
            'tem_animais' => 'nullable|boolean',
            'quais_animais' => 'nullable|string|max:255',
            'vacinados_castrados' => 'nullable|boolean',
            'onde_dia' => 'nullable|string|max:255',
            'onde_noite' => 'nullable|string|max:255',
            'acesso_interior' => 'nullable|boolean',

            'consciencia_longevidade' => 'nullable|boolean',
            'condicao_financeira' => 'nullable|boolean',
            'ja_abandonou' => 'nullable|boolean',
            'motivo_abandono' => 'nullable|string|max:255',
            'aceita_termos' => 'required|boolean',
        ]);

        Adocao::create($data);

        return redirect()->route('adocao.create', ['id_pet' => $data['id_pet']])
            ->with('success', 'Formulário enviado com sucesso!');
    }
}
