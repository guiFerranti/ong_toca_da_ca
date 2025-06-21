@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Conteúdos Gerenciáveis</h1>

        <table class="w-full border-collapse">
            <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Descrição</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($contents as $content)
                <tr>
                    <td class="border px-4 py-2">{{ $content->description }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.contents.edit', $content) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors">
                                Editar
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-4">Nenhum conteúdo gerenciável cadastrado.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        @if($contents->hasPages())
            <div class="mt-4">
                {{ $contents->links() }}
            </div>
        @endif
    </div>
@endsection
