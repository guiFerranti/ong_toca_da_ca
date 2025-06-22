@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Gerenciamento de Usuários</h1>

            <a href="{{ route('admin.users.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm mt-4 md:mt-0">
                Novo Usuário
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto mb-6">
            <h2 class="text-lg font-semibold p-4 bg-gray-100">Admins</h2>
            <table class="min-w-full table-fixed divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                    <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($admins as $admin)
                    <tr>
                        <td class="w-1/3 px-6 py-4 whitespace-nowrap">{{ $admin->name }}</td>
                        <td class="w-1/3 px-6 py-4">{{ $admin->email }}</td>
                        <td class="w-1/3 px-6 py-4">
                            <a href="{{ route('admin.users.edit', ['admin', $admin->id]) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto mb-6">
            <h2 class="text-lg font-semibold p-4 bg-gray-100">Usuários</h2>
            <table class="min-w-full table-fixed divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                    <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="w-1/3 px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="w-1/3 px-6 py-4">{{ $user->email }}</td>
                        <td class="w-1/3 px-6 py-4">
                            <a href="{{ route('admin.users.edit', ['user', $user->id]) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
