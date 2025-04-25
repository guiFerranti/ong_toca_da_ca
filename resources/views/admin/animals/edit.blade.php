@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Editar Animal</h1>

        <form action="{{ route('admin.animals.update', $animal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tipo" class="block text-gray-700">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="w-full p-2 border" value="{{ $animal->tipo }}" required>
            </div>

            <div class="mb-4">
                <label for="nome" class="block text-gray-700">Nome</label>
                <input type="text" name="nome" id="nome" class="w-full p-2 border" value="{{ $animal->nome }}">
            </div>

            <div class="mb-4">
                <label for="data_nascimento" class="block text-gray-700">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="w-full p-2 border" value="{{ $animal->data_nascimento }}">
            </div>

            <div class="mb-4">
                <label for="idade" class="block text-gray-700">Idade</label>
                <input type="text" name="idade" id="idade" class="w-full p-2 border" value="{{ $animal->idade }}">
            </div>

            <div class="mb-4">
                <label for="sexo" class="block text-gray-700">Sexo</label>
                <input type="text" name="sexo" id="sexo" class="w-full p-2 border" value="{{ $animal->sexo }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
        </form>
    </div>
@endsection
