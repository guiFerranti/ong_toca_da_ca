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
}
