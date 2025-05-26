@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-[#a516e6] mb-4">Transparência Financeira</h1>
            <p class="text-gray-600 text-lg">Acompanhe como utilizamos os recursos arrecadados</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($entries as $entry)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative overflow-hidden rounded-t-xl">
                        <a href="{{ $entry->image_url }}" target="_blank">
                            <img src="{{ $entry->image_url }}"
                                 alt="Comprovante de {{ $entry->description }}"
                                 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                        </a>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-[#a516e6] font-bold">{{ $entry->payment_date->format('d/m/Y') }}</span>
                            <span class="bg-purple-100 text-[#8a12c2] px-3 py-1 rounded-full text-sm">
                        R$ {{ number_format($entry->amount, 2, ',', '.') }}
                    </span>
                        </div>

                        <p class="text-gray-700 mb-4 line-clamp-3">{{ $entry->description }}</p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('public.accountability.show', $entry->id) }}"
                               class="text-[#a516e6] hover:text-[#8a12c2] font-medium flex items-center">
                                <span>Ver detalhes</span>
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ $entry->image_url }}"
                               download
                               class="text-gray-500 hover:text-[#a516e6] transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center">
            {{ $entries->links() }}
        </div>
    </div>
@endsection
