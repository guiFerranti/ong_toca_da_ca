<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Apadrinhamento;

class ApadrinhamentoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'cpf' => 'required|string|max:20',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'endereco' => 'required|string|max:255',
            'tipo_pet' => 'required|string|max:10',
            'nome_pet' => 'required|string|max:255',
            'tipo_apadrinhamento' => 'required|string|max:255',
            'contribuicao' => 'required|string|max:255',
            'frequencia' => 'required|string|max:20',
            'visita_regular' => 'required|boolean',
            'receber_atualizacoes' => 'required|boolean',
            'aceita_termos' => 'required|boolean',
            'id_pet' => 'required|exists:animals,id',
        ], ['*.required' => 'Campo obrigatório']);

        $apadrinhamento = Apadrinhamento::create($validated);

        NotificationService::create(
            'apadrinhamento',
            'Novo formulário de apadrinhamento enviado por ' . $validated['nome'],
            $validated['id_pet'],
            'animal',
            auth()->id(),
            $apadrinhamento->id
        );


        return redirect()->route('adocao.show')->with('success', 'Formulário de apadrinhamento registrado com sucesso.');
    }

    public function create($id_pet)
    {
        return view('publics.apadrinhamento.create', compact('id_pet'));
    }

    public function show()
    {
        $animaisAtivos = Animal::where('is_active', 1)->get();

        return view('publics.apadrinhamento.show', [
            'animais' => $animaisAtivos,
        ]);
    }


}
