@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Cadastrar Animal</h1>

        <form action="{{ route('admin.animals.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Imagem de Perfil</label>
                <input type="file" name="img_perfil" class="block w-full rounded-full border p-2 bg-white">
            </div>

            <div>
                <label class="block">Tipo *</label>
                <select name="tipo" required class="w-full border px-4 py-2 rounded">
                    <option value="">Selecione</option>
                    <option value="Gato">Gato</option>
                    <option value="Cachorro">Cachorro</option>
                </select>
            </div>

            <div>
                <label class="block">Nome</label>
                <input type="text" name="nome" class="w-full border px-4 py-2 rounded"/>
            </div>

            <div>
                <label class="block">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="w-full border px-4 py-2 rounded"/>
            </div>

            <div>
                <label class="block">Idade</label>
                <input type="text" name="idade" class="w-full border px-4 py-2 rounded"/>
            </div>

            <div class="mb-4">
                <label for="sexo" class="block text-gray-700">Sexo</label>
                <select name="sexo" id="sexo" class="w-full p-2 border">
                    <option value="" disabled {{ old('sexo') === null ? 'selected' : '' }}>Selecione</option>
                    <option value="Masculino" {{ old('sexo') === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Feminino" {{ old('sexo') === 'Feminino' ? 'selected' : '' }}>Feminino</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Salvar</button>
        </form>
    </div>
@endsection
