@extends('layouts.app')

@section('content')
    <div class="h-full w-full flex flex-col items-center">
        <div class="flex gap-4 w-2/3 py-8 items-center justify-center">
            <a href="{{ route('adocao.show') }}">
                <button class="px-6 py-2 font-bold rounded-md transition-colors duration-200
            {{ request()->routeIs('adocao.show') ? 'bg-[#0c9d44] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    TODOS
                </button>
            </a>

            <a href="{{ route('adocao.gatos.show') }}">
                <button class="px-6 py-2 font-bold rounded-md transition-colors duration-200
            {{ request()->routeIs('adocao.gatos.show') ? 'bg-[#0c9d44] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    GATOS
                </button>
            </a>

            <a href="{{ route('adocao.cachorros.show') }}">
                <button class="px-6 py-2 font-bold rounded-md transition-colors duration-200
            {{ request()->routeIs('adocao.cachorros.show') ? 'bg-[#0c9d44] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
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
                                        @if($animal->sexo === 'Feminino')
                                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                                                                       stroke-width="0"></g><g
                                                    id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path
                                                        fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M20 9C20 13.0803 16.9453 16.4471 12.9981 16.9383C12.9994 16.9587 13 16.9793 13 17V19H14C14.5523 19 15 19.4477 15 20C15 20.5523 14.5523 21 14 21H13V22C13 22.5523 12.5523 23 12 23C11.4477 23 11 22.5523 11 22V21H10C9.44772 21 9 20.5523 9 20C9 19.4477 9.44772 19 10 19H11V17C11 16.9793 11.0006 16.9587 11.0019 16.9383C7.05466 16.4471 4 13.0803 4 9C4 4.58172 7.58172 1 12 1C16.4183 1 20 4.58172 20 9ZM6.00365 9C6.00365 12.3117 8.68831 14.9963 12 14.9963C15.3117 14.9963 17.9963 12.3117 17.9963 9C17.9963 5.68831 15.3117 3.00365 12 3.00365C8.68831 3.00365 6.00365 5.68831 6.00365 9Z"
                                                        fill="#f6339a"></path> </g></svg>
                                        @else
                                            <svg class="h-6 w-6" viewBox="0 0 20 20" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" fill="#4981a9"><g
                                                    id="SVGRepo_bgCarrier" stroke-width="0"></g><g
                                                    id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>male [#4981a9]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g
                                                        id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd"> <g id="Dribbble-Light-Preview"
                                                                                transform="translate(-60.000000, -2079.000000)"
                                                                                fill="#4981a9"> <g id="icons"
                                                                                                   transform="translate(56.000000, 160.000000)"> <path
                                                                    d="M11,1937.005 C8.243,1937.005 6,1934.762 6,1932.005 C6,1929.248 8.243,1927.005 11,1927.005 C13.757,1927.005 16,1929.248 16,1932.005 C16,1934.762 13.757,1937.005 11,1937.005 L11,1937.005 Z M16,1919 L16,1921 L20.586,1921 L15.186,1926.402 C14.018,1925.527 12.572,1925.004 11,1925.004 C7.134,1925.004 4,1928.138 4,1932.004 C4,1935.87 7.134,1939.005 11,1939.005 C14.866,1939.005 18,1935.871 18,1932.005 C18,1930.433 17.475,1928.987 16.601,1927.818 L22,1922.419 L22,1927 L24,1927 L24,1919 L16,1919 Z"
                                                                    id="male-[#4981a9]"> </path> </g> </g> </g> </g></svg>
                                        @endif
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
