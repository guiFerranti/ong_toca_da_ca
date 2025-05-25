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

        <div class="grid grid-cols-4 w-2/3">
            @if($animais)
                @foreach($animais as $index => $animal)
                    <a href="{{ route('adocao.index', $animal->id) }}">
                        <div
                            class="h-[250px] w-[250px] bg-[#cbc9cc] rounded-lg flex flex-col p-2 items-center justify-between">
                            <img class="rounded-lg" src="{{ asset('/storage/'.$animal->img_perfil) }}"
                                 alt="imagem animal {{$animal->nome}}"/>
                            <span class="font-bold text-xl text-[#a416e6]">
                                {{ $animal->nome }}
                            </span>

                            <span class="font-bold text-lg text-[#a416e6]">
                                {{ $animal->small_description }}
                            </span>

                            @php
                                $nascimento = \Carbon\Carbon::parse($animal->data_nascimento);
                                $hoje = \Carbon\Carbon::now();
                                $anos = $nascimento->diffInYears($hoje);

                                $meses = $anos < 1 ? $nascimento->diffInMonths($hoje) : 0;
                            @endphp

                            <span class="font-bold text-lg text-[#a416e6]">
                                @if ($anos >= 1)
                                    {{ $anos }} {{ $anos === 1 ? 'ano' : 'anos' }}
                                @else
                                    {{ $meses }} {{ $meses === 1 ? 'mês' : 'meses' }}
                                @endif
                        </span>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>

@endsection
