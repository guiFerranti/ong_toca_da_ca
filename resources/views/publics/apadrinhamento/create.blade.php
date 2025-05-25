@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4 sm:p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Formulário de Apadrinhamento</h1>

        <form action="{{ route('apadrinhamento.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="id_pet" value="{{ $id_pet }}">

            <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nome Completo -->
                    <div>
                        <label class="block text-gray-700 mb-1">Nome completo</label>
                        <input type="text" name="nome"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nome') border-red-500 @enderror"
                               value="{{ old('nome') }}">
                        @error('nome')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Data de Nascimento -->
                    <div>
                        <label class="block text-gray-700 mb-1">Data de nascimento</label>
                        <input type="date" name="nascimento"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nascimento') border-red-500 @enderror"
                               value="{{ old('nascimento') }}">
                        @error('nascimento')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- CPF -->
                    <div>
                        <label class="block text-gray-700 mb-1">CPF</label>
                        <input type="text" name="cpf"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cpf') border-red-500 @enderror"
                               value="{{ old('cpf') }}">
                        @error('cpf')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Telefone -->
                    <div>
                        <label class="block text-gray-700 mb-1">Telefone</label>
                        <input type="text" name="telefone"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('telefone') border-red-500 @enderror"
                               value="{{ old('telefone') }}">
                        @error('telefone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-1">E-mail</label>
                        <input type="email" name="email"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                               value="{{ old('email') }}">
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Endereço -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-1">Endereço completo</label>
                        <input type="text" name="endereco"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('endereco') border-red-500 @enderror"
                               value="{{ old('endereco') }}">
                        @error('endereco')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sobre o Apadrinhamento</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Tipo de Pet -->
                    <div>
                        <label class="block text-gray-700 mb-1">Tipo de pet</label>
                        <select name="tipo_pet"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tipo_pet') border-red-500 @enderror">
                            <option value="">Selecione</option>
                            <option value="Cão" @if (old('tipo_pet') == 'Cão') selected @endif>Cão</option>
                            <option value="Gato" @if (old('tipo_pet') == 'Gato') selected @endif>Gato</option>
                        </select>
                        @error('tipo_pet')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nome do Pet (Opcional) -->
                    <div>
                        <label class="block text-gray-700 mb-1">Nome do pet (opcional)</label>
                        <input type="text" name="nome_pet"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nome_pet') border-red-500 @enderror"
                               value="{{ old('nome_pet') }}">
                        @error('nome_pet')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tipo de Apadrinhamento -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-1">Tipo de apadrinhamento</label>
                        <input type="text" name="tipo_apadrinhamento"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tipo_apadrinhamento') border-red-500 @enderror"
                               value="{{ old('tipo_apadrinhamento') }}">
                        @error('tipo_apadrinhamento')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contribuição -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-1">Valor ou tipo de contribuição</label>
                        <input type="text" name="contribuicao"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('contribuicao') border-red-500 @enderror"
                               value="{{ old('contribuicao') }}">
                        @error('contribuicao')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Frequência -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-1">Frequência</label>
                        <select name="frequencia"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('frequencia') border-red-500 @enderror">
                            <option value="">Selecione</option>
                            <option value="Semanal" @if (old('frequencia') == 'Semanal') selected @endif>Semanal
                            </option>
                            <option value="Quinzenal" @if (old('frequencia') == 'Quinzenal') selected @endif>Quinzenal
                            </option>
                            <option value="Mensal" @if (old('frequencia') == 'Mensal') selected @endif>Mensal</option>
                            <option value="Única" @if (old('frequencia') == 'Única') selected @endif>Única</option>
                        </select>
                        @error('frequencia')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Visita Regular -->
                    <div>
                        <label class="block text-gray-700 mb-1">Disposto a visitar o pet?</label>
                        <select name="visita_regular"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('visita_regular') border-red-500 @enderror">
                            <option value="">Selecione</option>
                            <option value="1" @if (old('visita_regular') == '1') selected @endif>Sim</option>
                            <option value="0" @if (old('visita_regular') == '0') selected @endif>Não</option>
                        </select>
                        @error('visita_regular')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Receber Atualizações -->
                    <div>
                        <label class="block text-gray-700 mb-1">Deseja receber atualizações?</label>
                        <select name="receber_atualizacoes"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('receber_atualizacoes') border-red-500 @enderror">
                            <option value="">Selecione</option>
                            <option value="1" @if (old('receber_atualizacoes') == '1') selected @endif>Sim</option>
                            <option value="0" @if (old('receber_atualizacoes') == '0') selected @endif>Não</option>
                        </select>
                        @error('receber_atualizacoes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Aceita Termos -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 mb-1">Aceita o termo de compromisso?</label>
                        <select name="aceita_termos"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('aceita_termos') border-red-500 @enderror">
                            <option value="">Selecione</option>
                            <option value="1" @if(old('aceita_termos') == '1') selected @endif>Sim</option>
                            <option value="0" @if(old('aceita_termos') == '0') selected @endif>Não</option>
                        </select>
                        @error('aceita_termos')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                Enviar
            </button>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        select {
            @apply appearance-none bg-white;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .border-red-500 {
            @apply border-red-500 focus:ring-red-500 focus:border-red-500;
        }
    </style>
@endpush
