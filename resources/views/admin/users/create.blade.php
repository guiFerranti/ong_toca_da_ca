@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4 max-w-4xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Novo Usuário</h1>

        <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white rounded-lg shadow p-6 space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-2">Nome *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-500">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-500">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Senha *</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-500">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Confirmar Senha *</label>
                <input type="password" name="password_confirmation"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-500">
            </div>

            {{--<div>--}}
            {{--    <label class="block text-gray-700 font-medium mb-2">Tipo de Usuário *</label>--}}
            {{--    <select name="type" class="w-full border border-gray-300 rounded px-4 py-2">--}}
            {{--        <option value="">Selecione...</option>--}}
            {{--        <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>--}}
            {{--        <option value="user" {{ old('type') == 'user' ? 'selected' : '' }}>Usuário</option>--}}
            {{--    </select>--}}
            {{--    @error('type')--}}
            {{--    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>--}}
            {{--    @enderror--}}
            {{--</div>--}}

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-6 rounded shadow-sm">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded shadow-sm">
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
