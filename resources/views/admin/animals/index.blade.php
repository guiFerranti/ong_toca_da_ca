@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Animais</h1>

        <a href="{{ route('admin.animals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Animal</a>

        <table class="w-full border-collapse">
            <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tipo</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Nascimento</th>
                <th class="border px-4 py-2">Idade</th>
                <th class="border px-4 py-2">Sexo</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($animals as $animal)
                <tr>
                    <td class="border px-4 py-2">{{ $animal->id }}</td>
                    <td class="border px-4 py-2">{{ $animal->tipo }}</td>
                    <td class="border px-4 py-2">{{ $animal->nome ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $animal->data_nascimento ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $animal->idade ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $animal->sexo ?? '-' }}</td>
                    <td class="border px-4 py-2">

                        <form action="{{ route('admin.animals.destroy', $animal->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center p-4">Nenhum animal cadastrado.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $animals->links() }}
        </div>
    </div>
@endsection
