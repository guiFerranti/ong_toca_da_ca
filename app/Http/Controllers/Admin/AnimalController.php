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
        $request->merge([
            'testado_fiv_felv' => $request->has('testado_fiv_felv'),
            'is_castrado' => $request->has('is_castrado'),
            'is_active' => $request->has('is_active'),
        ]);

        $validated = $request->validate([
            'tipo' => 'required|in:Gato,Cachorro',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'sexo' => 'required|in:Masculino,Feminino',
            'img_perfil' => 'nullable|image|max:2048',
            'small_description' => 'required|string',
            'description' => 'nullable|string',
            'testado_fiv_felv' => 'nullable',
            'is_castrado' => 'nullable',
            'is_active' => 'nullable',
        ]);

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
            'sexo' => 'required|in:Masculino,Feminino',
            'img_perfil' => 'required|image|max:2048',
            'small_description' => 'required|string|max:500',
            'description' => 'nullable|string|max:2000',
            'is_active' => 'nullable',
            'testado_fiv_felv' => 'nullable',
            'is_castrado' => 'nullable',
        ], [
            '*.required' => 'Campo obrigatório',
            'img_perfil.image' => 'O arquivo deve ser uma imagem',
            'img_perfil.max' => 'A imagem não pode ter mais que 2MB',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['testado_fiv_felv'] = $request->has('testado_fiv_felv');
        $validated['is_castrado'] = $request->has('is_castrado');

        if ($request->hasFile('img_perfil')) {
            $path = $request->file('img_perfil')->store('animals', 'public');
            $validated['img_perfil'] = $path;
        }

        Animal::create($validated);

        return redirect()->route('admin.animals.index')->with('success', 'Animal cadastrado com sucesso.');
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
        $animal->is_active = !$animal->is_active;
        $animal->save();

        return response()->json([
            'success' => true,
            'status' => $animal->is_active ? 'Ativo' : 'Inativo',
        ]);
    }

}
