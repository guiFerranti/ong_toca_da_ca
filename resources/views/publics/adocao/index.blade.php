@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row w-full h-full items-center md:items-stretch justify-center gap-6 p-4">
        <div class="flex flex-col items-center justify-start w-full md:w-1/3 gap-6">
            <img
                src='{{ asset('storage/animals/' . basename($animal->img_perfil)) }}'
                alt='{{ $animal->nome }}'
                class="rounded-xl h-[300px] w-auto max-w-full object-cover"
            />

            <div class="hidden md:block w-full">
                <a href="{{ route('adocao.create', $animal->id) }}" class="w-full">
                    <button class="bg-[#0c9d44] w-full py-3 text-white text-lg font-semibold rounded-md md:text-xl">
                        ADOTAR
                    </button>
                </a>
            </div>
        </div>

        <div class="flex flex-col items-center justify-start w-full md:w-1/3 gap-6">
            <div class="bg-[#a556c9] w-full h-full p-4 rounded-xl space-y-3">
                <h2 class="text-white text-center font-bold text-2xl">
                    {{ $animal->nome }}
                </h2>

                <div class="flex flex-col items-center space-y-2 mt-2">
                    <span class="text-white font-bold text-lg uppercase">{{ $animal->sexo }}</span>

                    <span class="text-white font-bold text-lg uppercase">
                    {{ $animal->is_castrado ? '' : 'NÃO ' }}CASTRADO
                </span>

                    @if (!$animal->testado_fiv_felv)
                        <span class="text-white font-bold text-lg uppercase">TESTADO</span>
                    @endif
                </div>

                <div class="flex flex-col items-center space-y-2 mt-4">
                <span class="text-white font-bold text-lg uppercase text-center">
                    VACINA POR CONTA DO ADOTANTE
                </span>

                    @if ($animal->tipo === 'Gato')
                        <span class="text-white font-bold text-lg uppercase text-center">
                        APENAS PARA LARES TELADOS E SEM ACESSO À RUA!
                    </span>
                    @endif
                </div>
            </div>

            <div class="hidden md:block w-full">
                <a href="{{ route('apadrinhamento.create', $animal->id) }}" class="w-full">
                    <button class="bg-[#0c9d44] w-full py-3 text-white text-lg font-semibold rounded-md md:text-xl">
                        APADRINHAR
                    </button>
                </a>
            </div>
        </div>

        <div class="flex md:hidden w-full gap-4 pt-4">
            <a href="{{ route('adocao.create', $animal->id) }}" class="w-1/2">
                <button class="bg-[#0c9d44] w-full py-3 text-white text-lg font-semibold rounded-md">
                    ADOTAR
                </button>
            </a>
            <a href="{{ route('apadrinhamento.create', $animal->id) }}" class="w-1/2">
                <button class="bg-[#0c9d44] w-full py-3 text-white text-lg font-semibold rounded-md">
                    APADRINHAR
                </button>
            </a>
        </div>
    </div>
@endsection
