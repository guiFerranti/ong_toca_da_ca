@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Editar Animal</h1>

        <form action="{{ route('admin.animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Imagem de Perfil</label>
                <input type="file" name="img_perfil" class="block w-full rounded-full border p-2 bg-white">
            </div>

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
                <select name="sexo" id="sexo" class="w-full p-2 border">
                    <option value="" disabled selected>Selecione</option>
                    <option value="Masculino" {{ old('sexo', $animal->sexo) === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Feminino" {{ old('sexo', $animal->sexo) === 'Feminino' ? 'selected' : '' }}>Feminino</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Imagens adicionais</label>
                <input type="file" name="imagens[]" multiple class="block w-full border p-2 bg-white">
            </div>

            @if(isset($animal))
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    @foreach($animal->imagens as $img)
                        <div class="border p-1">
                            <img src="{{ asset('storage/' . $img->path) }}" class="w-full h-32 object-cover" alt="Imagem do animal">
                        </div>
                    @endforeach
                </div>
            @endif


            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
        </form>
    </div>
@endsection
