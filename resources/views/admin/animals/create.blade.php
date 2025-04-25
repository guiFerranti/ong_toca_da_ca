@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Cadastrar Animal</h1>

        <form action="{{ route('admin.animals.store') }}" method="POST" class="space-y-4">
            @csrf

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
                <input type="text" name="nome" class="w-full border px-4 py-2 rounded" />
            </div>

            <div>
                <label class="block">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="w-full border px-4 py-2 rounded" />
            </div>

            <div>
                <label class="block">Idade</label>
                <input type="text" name="idade" class="w-full border px-4 py-2 rounded" />
            </div>

            <div>
                <label class="block">Sexo</label>
                <input type="text" name="sexo" class="w-full border px-4 py-2 rounded" />
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Salvar</button>
        </form>
    </div>
@endsection
