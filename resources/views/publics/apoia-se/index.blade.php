@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#a516e6] to-[#b74bff] bg-clip-text text-transparent mb-4">
                Brechó Solidário
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                Sua doação transforma vidas de animais resgatados
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="space-y-8 order-2 md:order-1">
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-[#e9d8fd]">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('imgs/qr-code.png') }}"
                                 alt="QR Code para doação"
                                 class="w-48 h-48 rounded-lg">
                        </div>
                        <div class="text-center md:text-left">
                            <h3 class="text-xl font-bold mb-2">Doação via PIX</h3>
                            <p class="mb-4 text-gray-600">Escaneie o QR Code ou</p>
                            <a href="https://apoia.se/tocadaca" target="_blank"
                               class="inline-block bg-[#0c9d44] hover:bg-[#0b843a] text-white
                                  px-6 py-2 rounded-full transition-colors">
                                Doe pela vakinha
                            </a>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <div class="flex items-start gap-3">
                        <div class="bg-[#a516e6] text-white p-2 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v1m6 11h2m-6 0h-2m4-10a4 4 0 11-8 0 4 4 0 018 0zM4 20a2 2 0 012-2h12a2 2 0 012 2v1H4v-1z"/>
                            </svg>
                        </div>
                        <p>Nosso lar de adoção de pets agora também tem um brechó solidário! Todo valor arrecadado é
                            convertido em:</p>
                    </div>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 pl-4">
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-[#b74bff] rounded-full"></div>
                            Alimentação de qualidade
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-[#b74bff] rounded-full"></div>
                            Cuidados veterinários
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-[#b74bff] rounded-full"></div>
                            Melhorias no abrigo
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-[#b74bff] rounded-full"></div>
                            Tratamentos especiais
                        </li>
                    </ul>
                </div>
            </div>

            <div class="order-1 md:order-2">
                <div class="relative rounded-2xl overflow-hidden shadow-lg">
                    <img src="{{ asset('imgs/brecho.jpg') }}"
                         alt="Brechó Solidário"
                         class="w-full h-auto object-cover transform hover:scale-105 transition-transform">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 flex items-end p-6">
                        <div class="text-white">
                            <p class="text-lg font-semibold">Como ajudar?</p>
                            <p class="text-sm">Doe roupas em bom estado ou venha fazer compras cheias de propósito!</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 bg-[#f8f5ff] p-6 rounded-2xl">
                    <div class="flex items-center gap-4">
                        <div class="bg-[#a516e6] text-white p-3 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Doe Roupas</h3>
                            <p class="text-sm text-gray-600">Aceitamos doações de roupas em bom estado para nosso
                                brechó</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center border-t pt-8">
            <p class="text-gray-600">
                Juntos, fazemos a diferença! ❤<br>
                <span class="text-sm">Todo gesto de caridade transforma um destino animal</span>
            </p>
        </div>
    </div>
@endsection
