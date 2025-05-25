<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::orderByDesc('created_at')->paginate(10);
        return view('admin.animals.index', compact('animals'));
    }

    public function edit(Animal $animal)
    {
        return view('admin.animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'tipo' => 'required|in:Gato,Cachorro',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'sexo' => 'required|in:Masculino,Feminino',
            'img_perfil' => 'nullable|image|max:2048',
            'small_description' => 'required|string',
            'description' => 'nullable|string',
            'testado_fiv_felv' => 'nullable|boolean',
            'is_castrado' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ], ['*.required' => 'Campo obrigatório']);

        if ($request->hasFile('img_perfil')) {
            $validated['img_perfil'] = $request->file('img_perfil')->store('animals', 'public');
        }

        $animal->update($validated);

        return redirect()
            ->route('admin.animals.index')
            ->with('success', 'Animal atualizado com sucesso!');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|in:Gato,Cachorro',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'idade' => 'nullable|string|max:255',
            'sexo' => 'required|in:Masculino,Feminino',
            'img_perfil' => 'required|image|max:2048',
            
        ], ['*.required' => 'Campo obrigatório']);

        if ($request->hasFile('img_perfil')) {
            $validated['img_perfil'] = $request->file('img_perfil')->store('animals', 'public');
        }

        Animal::create($validated);

        return redirect()->route('admin.animals.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    public function create()
    {
        return view('admin.animals.create');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('admin.animals.index')->with('success', 'Animal deletado com sucesso!');
    }

    public function toggleStatus(Animal $animal)
    {
        $animal->ativo = !$animal->ativo;
        $animal->save();

        return response()->json([
            'success' => true,
            'status' => $animal->ativo ? 'Ativo' : 'Inativo',
        ]);
    }

}
