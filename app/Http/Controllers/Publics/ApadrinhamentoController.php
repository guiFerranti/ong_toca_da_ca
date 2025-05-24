<?php
namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apadrinhamento;

class ApadrinhamentoController extends Controller
{
    public function create($id_pet)
    {
        return view('public.apadrinhamento.create', compact('id_pet'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'cpf' => 'required|string|max:20|unique:apadrinhamentos,cpf',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:apadrinhamentos,email',
            'endereco' => 'required|string|max:255',
            'tipo_pet' => 'required|string|max:10',
            'nome_pet' => 'nullable|string|max:255',
            'tipo_apadrinhamento' => 'required|string|max:255',
            'contribuicao' => 'required|string|max:255',
            'frequencia' => 'required|string|max:20',
            'visita_regular' => 'required|boolean',
            'receber_atualizacoes' => 'required|boolean',
            'aceita_termos' => 'required|boolean',
            'id_pet' => 'nullable|exists:animals,id',
        ]);

        Apadrinhamento::create($validated);

        return redirect()->route('home')->with('success', 'Apadrinhamento registrado com sucesso.');
    }
}
