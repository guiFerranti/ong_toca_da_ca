<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Adocao;

class AdocaoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pet' => 'required|integer|exists:animals,id',

            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'profissao' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'endereco' => 'required|string|max:255',
            'tipo_residencia' => 'required|in:casa,apartamento,sitio',
            'imovel_proprio' => 'required|boolean',
            'permite_animais' => 'required|boolean',

            'tipo_pet' => 'required|in:cao,gato',
            'nome_pet' => 'required|string|max:255',

            'qtd_pessoas' => 'required|integer',
            'todos_de_acordo' => 'required|boolean',
            'tem_criancas' => 'required|boolean',
            'tem_animais' => 'required|boolean',
            'quais_animais' => 'required|string|max:255',
            'vacinados_castrados' => 'required|boolean',
            'onde_dia' => 'required|string|max:255',
            'onde_noite' => 'required|string|max:255',
            'acesso_interior' => 'required|boolean',

            'consciencia_longevidade' => 'required|boolean',
            'condicao_financeira' => 'required|boolean',
            'ja_abandonou' => 'required|boolean',
            'motivo_abandono' => 'required|string|max:255',
            'aceita_termos' => 'required|boolean',
        ], ['*.required' => 'Campo obrigatório']);


        Adocao::create($data);

        return redirect()->route('adocao.create', ['id_pet' => $data['id_pet']])
            ->with('success', 'Formulário enviado com sucesso!');
    }

    public function create($id_pet)
    {
        if (!$id_pet) {
            abort(400, 'ID do pet é obrigatório.');
        }

        return view('publics.adocao.create', compact('id_pet'));
    }

    public function show()
    {
        $animaisAtivos = Animal::where('is_active', 1)
            ->where('tipo', 'Gato')
            ->get();

        return view('publics.adocao.show', [
            'animais' => $animaisAtivos,
        ]);
    }

    public function showGatos()
    {
        $animaisAtivos = Animal::where('is_active', 1)
            ->where('tipo', 'Gato')
            ->get();

        return view('publics.adocao.show', [
            'animais' => $animaisAtivos,
        ]);
    }

    public function showDogs()
    {
        $animaisAtivos = Animal::where('is_active', 1)
            ->where('tipo', 'Cachorro')
            ->get();

        return view('publics.adocao.show', [
            'animais' => $animaisAtivos,
        ]);
    }

    public function index($id)
    {
        $animal = Animal::find($id);

        return view('publics.adocao.index', compact('animal'));
    }
}
