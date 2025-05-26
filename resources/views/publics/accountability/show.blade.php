@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-gradient-to-br from-[#a516e6] to-[#b74bff] rounded-xl shadow-xl text-white">
            <div class="p-6 md:p-8 text-center">
                <h1 class="text-3xl font-bold mb-2">Comprovante Financeiro</h1>
                <p class="text-lg">{{ $entry->payment_date->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                        <span class="font-semibold text-[#a516e6]">Valor:</span>
                        <span class="text-xl font-bold">R$ {{ number_format($entry->amount, 2, ',', '.') }}</span>
                    </div>

                    <div class="p-3">
                        <h3 class="text-xl font-bold text-[#a516e6] mb-3">Descrição</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $entry->description }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="relative group">
                    <a href="{{ $entry->image_url }}" target="_blank" class="block">
                        <img src="{{ $entry->image_url }}"
                             alt="Comprovante completo"
                             class="w-full h-96 object-contain transition-transform duration-300 group-hover:scale-105">
                    </a>
                    <div class="absolute bottom-4 right-4 bg-white/90 px-4 py-2 rounded-full shadow-sm">
                        <a href="{{ $entry->image_url }}" download
                           class="text-[#a516e6] hover:text-[#8a12c2] flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Baixar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('public.accountability.index') }}"
               class="inline-block bg-[#a516e6] hover:bg-[#8a12c2] text-white px-6 py-3 rounded-lg transition-colors duration-200 font-medium">
                Voltar para a lista
            </a>
        </div>
    </div>
@endsection
