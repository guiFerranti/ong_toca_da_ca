@extends('layouts.app')

@section('content')
    <div class="h-full w-full flex flex-col items-center">
        <div class="flex gap-10 w-2/3 py-8 items-center justify-center">
            <a href="{{ route('adocao.gatos.show') }}">
                <button class="bg-[#0c9d44] px-6 py-2 text-white font-bold rounded-md">
                    GATOS
                </button>
            </a>

            <a href="{{ route('adocao.cachorros.show') }}">
                <button class="bg-[#0c9d44] px-6 py-2 text-white font-bold rounded-md">
                    CACHORROS
                </button>
            </a>
        </div>

        <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($animais as $animal)
                    <div
                        class="bg-[#cac8cc] rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                        <div class="relative h-48 md:h-64 overflow-hidden flex-shrink-0">
                            <img src="{{ asset('storage/' . $animal->img_perfil) }}"
                                 alt="{{ $animal->nome }}"
                                 class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">

                            <div
                                class="absolute top-2 right-2 bg-{{ $animal->is_active ? 'green' : 'red' }}-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                                {{ $animal->is_active ? 'Disponível' : 'Adotado' }}
                            </div>
                        </div>
                        @php
                            $nascimento = \Carbon\Carbon::parse($animal->data_nascimento);
                            $hoje = \Carbon\Carbon::now();
                            $diff = $nascimento->diff($hoje);

                            $anos = $diff->y;
                            $meses = $diff->m;
                        @endphp
                        
                        <div class="p-4 md:p-6 flex flex-col flex-grow">
                            <div class="mb-4">
                                <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ $animal->nome }}</h2>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600">
                                        {{ $animal->tipo }} •
                                        <span class="text-gray-500">@if ($anos >= 1)
                                                {{ $anos }} {{ $anos === 1 ? 'ano' : 'anos' }}
                                            @else
                                                {{ $meses }} {{ $meses === 1 ? 'mês' : 'meses' }}
                                            @endif</span>
                                    </p>
                                    <span class="text-sm font-medium text-gray-500">
                    {{ $animal->sexo === 'Feminino' ? '♀' : '♂' }}
                </span>
                                </div>
                            </div>

                            <div class="space-y-3 border-t pt-4 flex-grow">
                                <p class="text-gray-700 text-base leading-relaxed line-clamp-3">
                                    {{ $animal->small_description }}
                                </p>

                                @if($animal->is_castrado || $animal->testado_fiv_felv)
                                    <div class="flex flex-wrap gap-2 text-sm mt-2">
                                        @if($animal->is_castrado)
                                            <span
                                                class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Castrado</span>
                                        @endif
                                        @if($animal->testado_fiv_felv)
                                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Testado FIV/FeLV</span>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4 pt-4 border-t">
                                <a href="{{ route('adocao.index', $animal->id) }}"
                                   class="block w-full bg-[#a516e6] hover:bg-[#8a12c2] text-white text-center py-2 px-4 rounded-lg transition-colors duration-200">
                                    Ver detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
