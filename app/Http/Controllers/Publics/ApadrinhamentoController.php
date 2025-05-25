<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Apadrinhamento;

class ApadrinhamentoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
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

        Apadrinhamento::create($validated);

        return redirect()->route('home.show')->with('success', 'Apadrinhamento registrado com sucesso.');
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
