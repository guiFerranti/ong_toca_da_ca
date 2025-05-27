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
            'idade' => 'required|integer|max:100',
            'profissao' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'endereco' => 'required|string|max:255',
            'tipo_moradia' => 'required|in:casa,apartamento,sitio',
            'tipo_imovel' => 'required|boolean',
            'permite_pet' => 'required|boolean',

            'tipo_pet' => 'required|in:cao,gato',
            'nome_pet' => 'required|string|max:255',

            'qtd_pessoas' => 'required|integer',
            'todos_aceitam' => 'required|boolean',
            'tem_criancas' => 'required|boolean',
            'tem_animais' => 'required|boolean',
            'animais_info' => 'required|string|max:255',
            'todos_vacinados' => 'required|boolean',
            'local_dia' => 'required|string|max:255',
            'local_noite' => 'required|string|max:255',
            'acesso_interno' => 'required|boolean',

            'ciente_longevidade' => 'required|boolean',
            'cond_financeira' => 'required|boolean',
            'ja_abandonou' => 'required|boolean',
            'motivo_abandono' => 'required|string|max:255',
            'aceita_termo' => 'required|boolean',
        ], ['*.required' => 'Campo obrigatório', '*.max' => 'Valor inválido']);


        Adocao::create($data);

        return redirect()->route('adocao.show', ['id_pet' => $data['id_pet']])
            ->with('success', 'Formulário de adoção enviado com sucesso!');
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
