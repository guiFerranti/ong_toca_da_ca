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

    public function create()
    {
        return view('admin.animals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|in:Gato,Cachorro',
            'nome' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'idade' => 'nullable|string|max:255',
            'sexo' => 'required|in:Masculino,Feminino',
            'img_perfil' => 'required|image|max:2048',
            'imagens.*' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('img_perfil')) {
            $validated['img_perfil'] = $request->file('img_perfil')->store('animals', 'public');
        }

        $animal = Animal::create($validated);

        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $img) {
                $animal->imagens()->create([
                    'path' => $img->store('animal_galeria', 'public'),
                ]);
            }
        }

        return redirect()->route('admin.animals.index')->with('success', 'Animal cadastrado com sucesso!');
    }


    public function edit(Animal $animal)
    {
        return view('admin.animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'tipo' => 'required|in:Gato,Cachorro',
            'nome' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'idade' => 'nullable|string|max:255',
            'sexo' => 'required|in:Masculino,Feminino',
            'img_perfil' => 'nullable|image|max:2048',
            'imagens.*' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('img_perfil')) {
            $validated['img_perfil'] = $request->file('img_perfil')->store('animals', 'public');
        }

        $animal->update($validated);

        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $img) {
                $animal->imagens()->create([
                    'path' => $img->store('animal_galeria', 'public'),
                ]);
            }
        }

        return redirect()->route('admin.animals.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('admin.animals.index')->with('success', 'Animal deletado com sucesso!');
    }
}
