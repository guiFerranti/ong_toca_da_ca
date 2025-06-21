@extends('layouts.app-admin')

@section('content')
    <div class=" W-FULL px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Prestação de Contas</h1>

            <a href="{{ route('admin.accountability.create') }}"
               class="mt-4 md:mt-0 bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition duration-150 ease-in-out">
                Novo Registro
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Comprovante</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($entries as $entry)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $entry->payment_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">R$ {{ number_format($entry->amount, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ Str::limit($entry->description, 50) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ $entry->image_url }}" target="_blank"
                               class="text-blue-600 hover:text-blue-900 hover:underline">
                                Visualizar
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 h-full justify-center">
                                <a href="{{ route('admin.accountability.edit', $entry->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors h-10 flex items-center justify-center">
                                    Editar
                                </a>

                                <form action="{{ route('admin.accountability.destroy', $entry->id) }}" method="POST"
                                      class="h-10">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors h-full w-full flex items-center justify-center">
                                        Deletar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $entries->links() }}
        </div>
    </div>
@endsection
