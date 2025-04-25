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
            'sexo' => 'nullable|string|max:255',
        ]);

        Animal::create($validated);

        return redirect()->route('admin.animals.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    public function edit(Animal $animal)
    {
        return view('admin.animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'tipo' => 'required|string',
            'nome' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'idade' => 'nullable|string',
            'sexo' => 'nullable|string',
        ]);

        $animal->update($validated);

        return redirect()->route('admin.animals.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('admin.animals.index')->with('success', 'Animal deletado com sucesso!');
    }
}
