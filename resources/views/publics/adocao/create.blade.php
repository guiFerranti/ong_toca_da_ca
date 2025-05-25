@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-4 sm:p-6 bg-white rounded-lg shadow-md mt-6 sm:mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Questionário para Adoção de Pet</h1>

        <form action="{{ route('adocao.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="id_pet" value="{{ $id_pet }}">

            <!-- Seção de Informações Pessoais -->
            <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Informações Pessoais</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="nome" placeholder="Nome completo"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nome') border-red-500 @enderror"
                            value="{{ old('nome') }}">
                        @error('nome')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="number" name="idade" placeholder="Idade"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('idade') border-red-500 @enderror"
                            value="{{ old('idade') }}">
                        @error('idade')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="text" name="profissao" placeholder="Profissão"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('profissao') border-red-500 @enderror"
                            value="{{ old('profissao') }}">
                        @error('profissao')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="text" name="telefone" placeholder="Telefone"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('telefone') border-red-500 @enderror"
                            value="{{ old('telefone') }}">
                        @error('telefone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="email" name="email" placeholder="E-mail"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="text" name="endereco" placeholder="Endereço completo"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('endereco') border-red-500 @enderror"
                            value="{{ old('endereco') }}">
                        @error('endereco')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-6 mt-4">
                    <div class="space-y-2">
                        <label class="block text-gray-700">Mora em:</label>
                        <div class="flex flex-wrap gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="tipo_moradia" value="casa"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tipo_moradia') == 'casa') checked @endif>
                                <span class="ml-2">Casa</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="tipo_moradia" value="apartamento"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tipo_moradia') == 'apartamento') checked @endif>
                                <span class="ml-2">Apartamento</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="tipo_moradia" value="sitio"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tipo_moradia') == 'sitio') checked @endif>
                                <span class="ml-2">Sítio/Chácara</span>
                            </label>
                        </div>
                        @error('tipo_moradia')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Imóvel:</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="tipo_imovel" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tipo_imovel') == '1') checked @endif>
                                <span class="ml-2">Próprio</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="tipo_imovel" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tipo_imovel') == '0') checked @endif>
                                <span class="ml-2">Alugado</span>
                            </label>
                        </div>
                        @error('tipo_imovel')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 space-y-2">
                    <label class="block text-gray-700">Se alugado, o proprietário permite animais?</label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="permite_pet" value="1"
                                class="text-blue-600 focus:ring-blue-500" @if (old('permite_pet') == '1') checked @endif>
                            <span class="ml-2">Sim</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="permite_pet" value="0"
                                class="text-blue-600 focus:ring-blue-500" @if (old('permite_pet') == '0') checked @endif>
                            <span class="ml-2">Não</span>
                        </label>
                    </div>
                    @error('permite_pet')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Seção Sobre o Pet -->
            <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sobre o Pet</h2>
                <div class="space-y-2">
                    <label class="block text-gray-700">Tipo de pet:</label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="tipo_pet" value="cao"
                                class="text-blue-600 focus:ring-blue-500"
                                @if (old('tipo_pet') == 'cao') checked @endif>
                            <span class="ml-2">Cão</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="tipo_pet" value="gato"
                                class="text-blue-600 focus:ring-blue-500"
                                @if (old('tipo_pet') == 'gato') checked @endif>
                            <span class="ml-2">Gato</span>
                        </label>
                    </div>
                    @error('tipo_pet')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <input type="text" name="nome_pet" placeholder="Nome do pet"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nome_pet') border-red-500 @enderror"
                        value="{{ old('nome_pet') }}">
                    @error('nome_pet')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Seção Sobre o Lar -->
            <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Sobre o Lar</h2>
                <div class="space-y-4">
                    <div>
                        <input type="number" name="qtd_pessoas" placeholder="Quantas pessoas moram na casa?"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('qtd_pessoas') border-red-500 @enderror"
                            value="{{ old('qtd_pessoas') }}">
                        @error('qtd_pessoas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Todos estão de acordo com a adoção?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="todos_aceitam" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('todos_aceitam') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="todos_aceitam" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('todos_aceitam') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('todos_aceitam')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Há crianças?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="tem_criancas" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tem_criancas') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="tem_criancas" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tem_criancas') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('tem_criancas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Possui outros animais?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="tem_animais" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tem_animais') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="tem_animais" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('tem_animais') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('tem_animais')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="mt-2">
                            <input type="text" name="animais_info" placeholder="Quais e quantos?"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('animais_info') border-red-500 @enderror"
                                value="{{ old('animais_info') }}">
                            @error('animais_info')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Todos os animais são vacinados e castrados?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="todos_vacinados" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('todos_vacinados') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="todos_vacinados" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('todos_vacinados') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('todos_vacinados')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="text" name="local_dia" placeholder="Onde o pet ficará durante o dia?"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('local_dia') border-red-500 @enderror"
                            value="{{ old('local_dia') }}">
                        @error('local_dia')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="text" name="local_noite" placeholder="E durante a noite?"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('local_noite') border-red-500 @enderror"
                            value="{{ old('local_noite') }}">
                        @error('local_noite')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">O pet terá acesso ao interior da casa?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="acesso_interno" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('acesso_interno') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="acesso_interno" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('acesso_interno') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('acesso_interno')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Seção Compromisso -->
            <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Compromisso</h2>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="block text-gray-700">Está ciente de que o pet pode viver 10 anos ou mais?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ciente_longevidade" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('ciente_longevidade') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="ciente_longevidade" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('ciente_longevidade') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('ciente_longevidade')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Tem condições financeiras?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="cond_financeira" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('cond_financeira') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="cond_financeira" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('cond_financeira') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('cond_financeira')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Já teve que doar ou abandonar um animal?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ja_abandonou" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('ja_abandonou') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="ja_abandonou" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('ja_abandonou') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('ja_abandonou')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="mt-2">
                            <input type="text" name="motivo_abandono" placeholder="Por quê?"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('motivo_abandono') border-red-500 @enderror"
                                value="{{ old('motivo_abandono') }}">
                            @error('motivo_abandono')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700">Está de acordo com o termo de responsabilidade?</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="aceita_termo" value="1"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('aceita_termo') == '1') checked @endif>
                                <span class="ml-2">Sim</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="aceita_termo" value="0"
                                    class="text-blue-600 focus:ring-blue-500"
                                    @if (old('aceita_termo') == '0') checked @endif>
                                <span class="ml-2">Não</span>
                            </label>
                        </div>
                        @error('aceita_termo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                Enviar formulário
            </button>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .input {
            @apply w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200;
        }

        input[type="radio"] {
            @apply h-4 w-4;
        }

        .border-red-500 {
            @apply border-red-500 focus:ring-red-500 focus:border-red-500;
        }
    </style>
@endpush
