@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4 max-w-4xl">
        <h1 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-gray-800">Editar Animal</h1>

        <form action="{{ route('admin.animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-lg shadow-md p-4 md:p-6 space-y-4 md:space-y-6">
            @csrf
            @method('PUT')

            <div class="border-b pb-4 md:pb-6">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-gray-700">Imagem de Perfil</h2>

                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="flex-shrink-0">
                        @if($animal->img_perfil)
                            <div class="relative group">
                                <img src="{{ asset('storage/animals/' . basename($animal->img_perfil)) }}"
                                     alt="Imagem atual"
                                     class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-full border-4 border-blue-100 shadow-md">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-30 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="text-white font-medium text-sm">Imagem Atual</span>
                                </div>
                            </div>
                        @else
                            <div
                                class="w-32 h-32 md:w-40 md:h-40 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500">Sem imagem</span>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1 w-full">
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Alterar Imagem</label>
                        <input type="file" name="img_perfil"
                               class="block w-full text-sm text-gray-500
                                      file:mr-2 file:py-1 file:px-3 md:file:py-2 md:file:px-4
                                      file:rounded file:border-0
                                      file:text-xs md:file:text-sm file:font-medium
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100">
                        @error('img_perfil') <p
                            class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                        <p class="text-xs text-gray-500 mt-1">Deixe em branco para manter a imagem atual</p>
                    </div>
                </div>
            </div>

            <div class="border-b pb-4 md:pb-6">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-gray-700">Informações Básicas</h2>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Tipo *</label>
                        <select name="tipo"
                                class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Selecione</option>
                            <option value="Gato" {{ old('tipo', $animal->tipo) == 'Gato' ? 'selected' : '' }}>Gato
                            </option>
                            <option value="Cachorro" {{ old('tipo', $animal->tipo) == 'Cachorro' ? 'selected' : '' }}>
                                Cachorro
                            </option>
                        </select>
                        @error('tipo') <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Nome *</label>
                        <input type="text" name="nome" value="{{ old('nome', $animal->nome) }}"
                               class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
                        @error('nome') <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Data de Nascimento *</label>
                        <input type="date" name="data_nascimento" max="{{ now()->toDateString() }}"
                               value="{{ old('data_nascimento', $animal->data_nascimento) }}"
                               class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"/>
                        @error('data_nascimento') <p
                            class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Sexo *</label>
                        <select name="sexo"
                                class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Selecione</option>
                            <option
                                value="Masculino" {{ old('sexo', $animal->sexo) === 'Masculino' ? 'selected' : '' }}>
                                Masculino
                            </option>
                            <option value="Feminino" {{ old('sexo', $animal->sexo) === 'Feminino' ? 'selected' : '' }}>
                                Feminino
                            </option>
                        </select>
                        @error('sexo') <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Ativo?</label>
                        <div class="ml-2 md:ml-4">
                            <input type="checkbox" name="is_active"
                                   {{ old('is_active', $animal->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 md:h-5 md:w-5 text-blue-600 rounded focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-b pb-4 md:pb-6">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-gray-700">Informações de Saúde</h2>

                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="testado_fiv_felv" id="testado_fiv_felv"
                               {{ old('testado_fiv_felv', $animal->testado_fiv_felv) ? 'checked' : '' }}
                               class="h-4 w-4 md:h-5 md:w-5 text-blue-600 rounded focus:ring-blue-500">
                        <label for="testado_fiv_felv" class="ml-2 block text-sm md:text-base text-gray-700">Testado
                            FIV/FeLV</label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_castrado" id="is_castrado"
                               {{ old('is_castrado', $animal->is_castrado) ? 'checked' : '' }}
                               class="h-4 w-4 md:h-5 md:w-5 text-blue-600 rounded focus:ring-blue-500">
                        <label for="is_castrado" class="ml-2 block text-sm md:text-base text-gray-700">Castrado</label>
                    </div>
                </div>
            </div>

            <div class="border-b pb-4 md:pb-6">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-gray-700">Descrições</h2>

                <div class="space-y-4 md:space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Descrição Curta *</label>
                        <textarea name="small_description"
                                  class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  rows="3">{{ old('small_description', $animal->small_description) }}</textarea>
                        @error('small_description') <p
                            class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1 md:mb-2">Descrição Completa</label>
                        <textarea name="description"
                                  class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  rows="4">{{ old('description', $animal->description) }}</textarea>
                        @error('description') <p
                            class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-gray-700">Imagens Adicionais</h2>

                @if($animal->imagens && $animal->imagens->count())
                    <div class="mb-4">
                        <h3 class="text-md font-medium text-gray-700 mb-2">Imagens Atuais</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                            @foreach($animal->imagens as $img)
                                <div class="border rounded-md overflow-hidden group relative">
                                    <img src="{{ asset('storage/' . $img->path) }}"
                                         class="w-full h-28 object-cover"
                                         alt="Imagem do animal">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <button type="button"
                                                class="text-white bg-red-500 hover:bg-red-600 rounded-full p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div>
                    <label class="block text-gray-700 font-medium mb-1 md:mb-2">Adicionar Novas Imagens</label>
                    <input type="file" name="imagens[]" multiple
                           class="block w-full text-sm text-gray-500
                                  file:mr-2 file:py-1 file:px-3 md:file:py-2 md:file:px-4
                                  file:rounded file:border-0
                                  file:text-xs md:file:text-sm file:font-medium
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100">
                    <p class="text-xs text-gray-500 mt-1">Selecione múltiplas imagens se desejar</p>
                </div>
            </div>

            <div class="flex justify-end pt-3 md:pt-4">
                <button type="submit"
                        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 md:px-6 rounded shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-sm md:text-base">
                    Atualizar Animal
                </button>
            </div>
        </form>
    </div>
@endsection
