@extends('layouts.app-admin')

@section('content')
    <div class="W-FULL px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Conteúdos Gerenciáveis</h1>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @forelse ($contents as $content)
                    <tr>
                        <td class="px-6 py-4">{{ $content->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2 h-full justify-center">
                                <a href="{{ route('admin.contents.edit', $content) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors h-10 flex items-center justify-center">
                                    Editar
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">Nenhum conteúdo gerenciável
                            cadastrado.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        @if($contents->hasPages())
            <div class="mt-4">
                {{ $contents->links() }}
            </div>
        @endif
    </div>
@endsection
