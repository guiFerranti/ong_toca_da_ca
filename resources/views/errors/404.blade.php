@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-[#a516e6]/10 to-[#b74bff]/10 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 text-center">
            <!-- Ícone animado -->
            <div class="animate-bounce">
                <svg class="mx-auto h-32 w-32 text-[#a516e6]" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <!-- Mensagem principal -->
            <h1 class="text-6xl font-bold text-[#a516e6]">404</h1>
            <h2 class="mt-4 text-3xl font-extrabold text-gray-900">Página não encontrada</h2>
            <p class="mt-4 text-lg text-gray-600">
                Ops! Parece que o conteúdo que você procura foi adotado por outro usuário!
            </p>

            <!-- Botões de ação -->
            <div class="mt-8 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center">
                <a href="{{ route('home.show') }}"
                   class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-[#a516e6] hover:bg-[#8e12c2] transition-colors duration-200">
                    Voltar para Home
                </a>
                <a href="{{ route('adocao.show') }}"
                   class="px-6 py-3 border border-[#a516e6] text-base font-medium rounded-md text-[#a516e6] bg-white hover:bg-gray-50 transition-colors duration-200">
                    Ver Adoções
                </a>
                <a href="{{ route('apadrinhamento.show') }}"
                   class="px-6 py-3 border border-[#a516e6] text-base font-medium rounded-md text-[#a516e6] bg-white hover:bg-gray-50 transition-colors duration-200">
                    Apadrinhar
                </a>
            </div>

            <!-- Links úteis -->
            <div class="mt-8">
                <p class="text-sm text-gray-500">
                    Outras páginas que podem ajudar:
                    <a href="{{ route('sobre-nos.index') }}" class="text-[#a516e6] hover:text-[#8e12c2] ml-2">Sobre
                        Nós</a>
                    <a href="{{ route('public.accountability.index') }}"
                       class="text-[#a516e6] hover:text-[#8e12c2] ml-2">Transparência</a>
                    <a href="{{ route('publics.apoia-se.index') }}" class="text-[#a516e6] hover:text-[#8e12c2] ml-2">Apoia-se</a>
                </p>
            </div>
        </div>
    </div>

    <style>
        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    </style>
@endsection
