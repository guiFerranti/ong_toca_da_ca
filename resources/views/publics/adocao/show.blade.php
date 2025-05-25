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
                        <div class="h-[150px] w-[150px] bg-[#cbc9cc] rounded-lg flex flex-col p-2 items-center justify-center">
                            <img class="rounded-lg" src="{{$animal->img_perfil}}" alt="imagem animal {{$animal->nome}}"/>
                            <span>
                                {{$animal->nome}}
                            </span>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>

@endsection
