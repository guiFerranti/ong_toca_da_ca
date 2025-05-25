@extends('layouts.app')

@section('content')
    <div
        class="flex flex-col md:flex-row w-full h-full items-center md:items-stretch justify-center gap-6 p-4 max-w-6xl mx-auto">
        <div class="flex flex-col items-center w-full md:w-2/5 gap-6">
            <div class="relative w-full rounded-xl overflow-hidden shadow-lg">
                <img
                    src='{{ asset('storage/animals/' . basename($animal->img_perfil)) }}'
                    alt='{{ $animal->nome }}'
                    class="w-full h-auto max-h-[400px] object-cover transition-transform duration-300 hover:scale-105"
                />
                <div
                    class="absolute top-4 right-4 bg-{{ $animal->is_active ? 'green' : 'red' }}-500 text-white px-4 py-1 rounded-full text-sm font-bold shadow-md">
                    {{ $animal->is_active ? 'DISPONÍVEL' : 'ADOTADO' }}
                </div>
            </div>

            <div class="hidden md:flex w-full">
                <a href="{{ route('adocao.create', $animal->id) }}" class="w-full">
                    <button
                        class="bg-[#a516e6] hover:bg-[#8a12c2] w-full py-3 text-white text-lg font-bold rounded-xl transition-colors duration-200 shadow-md">
                        QUERO ADOTAR
                    </button>
                </a>
            </div>
        </div>

        <div class="flex flex-col w-full md:w-3/5 gap-6">
            <div class="bg-gradient-to-br from-[#a516e6] to-[#b74bff] w-full p-6 rounded-xl shadow-lg text-white">
                <div class="text-center mb-6">
                    <h1 class="text-3xl md:text-4xl font-extrabold mb-2">{{ $animal->nome }}</h1>
                    <p class="text-xl font-semibold">{{ $animal->tipo }} • {{ $animal->idade }} anos</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="space-y-4">
                        <div class="bg-white/10 p-3 rounded-lg">
                            <p class="font-bold text-lg">SEXO</p>
                            <p class="text-xl">{{ $animal->sexo }}</p>
                        </div>

                        <div class="bg-white/10 p-3 rounded-lg">
                            <p class="font-bold text-lg">CASTRADO</p>
                            <p class="text-xl">{{ $animal->is_castrado ? 'SIM' : 'NÃO' }}</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white/10 p-3 rounded-lg">
                            <p class="font-bold text-lg">TESTADO</p>
                            <p class="text-xl">{{ $animal->testado_fiv_felv ? 'SIM' : 'NÃO' }}</p>
                        </div>

                        <div class="bg-white/10 p-3 rounded-lg">
                            <p class="font-bold text-lg">VACINAÇÃO</p>
                            <p class="text-xl">POR CONTA DO ADOTANTE</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white/10 p-4 rounded-lg">
                    @if ($animal->tipo === 'Gato')
                        <p class="font-bold text-center text-lg mb-2">⚠️ ATENÇÃO</p>
                        <p class="text-center">APENAS PARA LARES TELADOS E SEM ACESSO À RUA!</p>
                    @else
                        <p class="text-center">Este animal precisa de um lar responsável e cheio de amor!</p>
                    @endif
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-[#a516e6] mb-4">SOBRE MIM</h3>
                <p class="text-gray-700 text-lg leading-relaxed">{{ $animal->description }}</p>
            </div>

            <div class="hidden md:flex gap-4">
                <a href="{{ route('adocao.create', $animal->id) }}" class="flex-1">
                    <button
                        class="bg-[#a516e6] hover:bg-[#8a12c2] w-full py-3 text-white text-lg font-bold rounded-xl transition-colors duration-200 shadow-md">
                        ADOTAR
                    </button>
                </a>
                <a href="{{ route('apadrinhamento.create', $animal->id) }}" class="flex-1">
                    <button
                        class="bg-[#0c9d44] hover:bg-[#0a8238] w-full py-3 text-white text-lg font-bold rounded-xl transition-colors duration-200 shadow-md">
                        APADRINHAR
                    </button>
                </a>
            </div>
        </div>

        <div class="flex md:hidden w-full gap-4">
            <a href="{{ route('adocao.create', $animal->id) }}" class="flex-1">
                <button
                    class="bg-[#a516e6] hover:bg-[#8a12c2] w-full py-3 text-white text-lg font-bold rounded-xl transition-colors duration-200">
                    ADOTAR
                </button>
            </a>
            <a href="{{ route('apadrinhamento.create', $animal->id) }}" class="flex-1">
                <button
                    class="bg-[#0c9d44] hover:bg-[#0a8238] w-full py-3 text-white text-lg font-bold rounded-xl transition-colors duration-200">
                    APADRINHAR
                </button>
            </a>
        </div>
    </div>
@endsection
