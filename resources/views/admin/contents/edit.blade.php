@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4 max-w-4xl">
        <h1 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-gray-800">Editar Conteúdo: {{ $content->key }}</h1>

        <form action="{{ route('admin.contents.update', $content) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-lg shadow-md p-4 md:p-6 space-y-4 md:space-y-6">
            @csrf
            @method('PUT')

            <div class="border-b pb-4 md:pb-6">
                <h2 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-gray-700">Configurações</h2>

                <div class="space-y-4">
                    <div>
                        <label for="description" class="block text-gray-700 font-medium mb-1 md:mb-2">Descrição</label>
                        <input type="text" name="description" id="description" disabled
                               class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 bg-gray-100 cursor-not-allowed"
                               value="{{ $content->description }}">
                    </div>

                    @if(str_contains($content->key, 'qr_code') || str_contains($content->key, 'qrcode'))
                        <div>
                            <label class="block text-gray-700 font-medium mb-1 md:mb-2">QR Code Atual</label>
                            @if($content->value)
                                <img src="{{ asset('storage/' . $content->value) }}" alt="QR Code atual"
                                     class="h-40 w-40 object-contain mb-4 mx-auto">
                            @else
                                <div
                                    class="h-40 w-40 bg-gray-100 rounded flex items-center justify-center text-gray-500 mx-auto">
                                    Nenhum QR Code definido
                                </div>
                            @endif

                            <label class="block text-gray-700 font-medium mb-1 md:mb-2">Atualizar QR Code</label>
                            <input type="file" name="image" accept="image/*"
                                   class="block w-full text-sm text-gray-500
                                          file:mr-2 file:py-1 file:px-3 md:file:py-2 md:file:px-4
                                          file:rounded file:border-0
                                          file:text-xs md:file:text-sm file:font-medium
                                          file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100">
                            @error('image')
                            <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @elseif(str_contains($content->key, 'link'))
                        <div>
                            <label for="value" class="block text-gray-700 font-medium mb-1 md:mb-2">URL</label>
                            <input type="url" name="value" id="value"
                                   class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   value="{{ old('value', $content->value) }}">
                            @error('value')
                            <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <div>
                            <label for="value" class="block text-gray-700 font-medium mb-1 md:mb-2">Conteúdo</label>
                            <textarea name="value" id="value" rows="5"
                                      class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('value', $content->value) }}</textarea>
                            @error('value')
                            <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-end pt-3 md:pt-4">
                <a href="{{ route('admin.contents.index') }}"
                   class="mr-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 md:px-6 rounded shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 text-sm md:text-base">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 md:px-6 rounded shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-sm md:text-base">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
@endsection
