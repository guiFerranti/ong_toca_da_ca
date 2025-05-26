@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="bg-gradient-to-r from-[#a516e6] to-[#b74bff] rounded-2xl p-8 md:p-12 text-white shadow-xl">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-center">SOBRE NÓS</h1>

                <div class="space-y-6 text-lg md:text-xl leading-relaxed">
                    <div class="flex items-start gap-4">
                        <svg class="w-8 h-8 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <p>Temos uma dedicação no cuidado destes animais há muitos anos. Desde 2010 nossa assistência se
                            intensificou e abrimos nossa casa para acolher e cuidar de animais de rua.</p>
                    </div>

                    <div class="flex items-start gap-4">
                        <svg class="w-8 h-8 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v1m6 11h2m-6 0h-2m4-10a4 4 0 11-8 0 4 4 0 018 0zM4 20a2 2 0 012-2h12a2 2 0 012 2v1H4v-1z"/>
                        </svg>
                        <p>São muitos cães e gatos abandonados que chegam até nós, muitas vezes doentes. Hoje temos um
                            foco especial em cuidar de gatos com esporotricose, casos que geralmente indicam a eutanásia
                            e nós tentamos dar uma chance!</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mt-12">
                    <div class="bg-white/10 p-6 rounded-xl">
                        <p class="text-3xl font-bold mb-2">13+</p>
                        <p class="text-sm uppercase tracking-wide">Anos de dedicação</p>
                    </div>
                    <div class="bg-white/10 p-6 rounded-xl">
                        <p class="text-3xl font-bold mb-2">2K+</p>
                        <p class="text-sm uppercase tracking-wide">Animais resgatados</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-12">
            <div class="relative h-64 rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('imgs/sobre1.avif') }}"
                     class="w-full h-full object-cover transform hover:scale-105 transition-transform"
                     alt="Equipe cuidando de animais">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 flex items-end p-4">
                    <span class="text-white font-medium">Cuidado diário</span>
                </div>
            </div>

            <div class="relative h-64 rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('imgs/sobre2.avif') }}"
                     class="w-full h-full object-cover transform hover:scale-105 transition-transform"
                     alt="Animal em tratamento">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 flex items-end p-4">
                    <span class="text-white font-medium">Tratamento especializado</span>
                </div>
            </div>

            <div class="relative h-64 rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('imgs/sobre3.jpg') }}"
                     class="w-full h-full object-cover transform hover:scale-105 transition-transform"
                     alt="Animal adotado feliz">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 flex items-end p-4">
                    <span class="text-white font-medium">Histórias de sucesso</span>
                </div>
            </div>
        </div>

        <div class="text-center mt-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Faça parte dessa história!</h2>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="{{ route('adocao.show') }}"
                   class="bg-[#a516e6] hover:bg-[#8a12c2] text-white px-8 py-3 rounded-full transition-colors font-semibold">
                    Quero Adotar
                </a>
                <a href="{{ route('adocao.show') }}"
                   class="bg-[#0c9d44] hover:bg-[#0b843a] text-white px-8 py-3 rounded-full transition-colors font-semibold">
                    Quero Apadrinhar
                </a>
            </div>
        </div>
    </div>
@endsection
