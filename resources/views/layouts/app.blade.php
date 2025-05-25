<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Sistema</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased min-h-screen flex flex-col">

<header class="relative bg-[#a516e6] text-white shadow-md">
    <div class="flex justify-center lg:justify-between mx-auto px-4 md:px-6 lg:px-12 lg:max-w-[80%] py-8 relative">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <img src="{{ asset('imgs/logo-no-bg.png') }}" alt="Admin Logo"
                 class="w-24 md:w-32 h-auto transition-transform hover:scale-105">

            <div class="text-center md:text-left space-y-4">
                <h1 class="text-3xl md:text-4xl font-bold leading-tight">
                    <span class="block">Transforme vidas.</span>
                    <span class="block">Adote um amigo!</span>
                </h1>

                <p class="text-lg md:text-xl font-semibold">
                    Conheça cães e gatos<br>
                    esperando um lar cheio de amor.
                </p>

                <div class="mt-4">
                    <a href="{{ route('adocao.show') }}"
                       class="inline-block bg-[#0c9d44] hover:bg-[#0b843a] text-white
                              rounded-full px-6 py-2 md:px-8 md:py-3 transition-all
                              duration-300 transform hover:scale-105">
                        Quero adotar
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 right-0 hidden lg:block">
            <div class="relative w-[400px] h-[295px]">
                <div
                    class="absolute inset-0 w-[250px] h-[250px] bg-white rounded-full shadow-xl z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>

                <img
                    width="250px"
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[45%]
             z-20 object-cover"
                    src="{{ asset('imgs/cao_gato.png') }}"
                />
            </div>
        </div>
    </div>
</header>

<main class="flex-grow">
    @yield('content')
</main>

<footer class="bg-[#b74bff] text-white py-8 px-4 md:py-4">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-6">

        <div class="order-1 md:order-none bg-white p-2 shrink-0
           rounded-full md:rounded-full
           -ml-4 md:ml-0">
            <img src="{{ asset('imgs/caes.png') }}" width="200px" alt="Toca da Ca"
                 class="w-full h-full object-contain">
        </div>

        <div class="min-h-full order-3 align-text-bottom md:order-none text-center md:text-left text-sm md:text-base">
            © {{ date('Y') }} Toca da Cá - Todos os direitos reservados
        </div>

        <a
            href="https://www.instagram.com/toca_da_ca/"
            target="_blank"
            class="order-2 md:order-none flex items-center gap-3 group hover:opacity-80 transition-opacity"
        >
            <div class="text-right self-end">
                <p class="text-lg md:text-xl font-semibold leading-tight">
                    Siga o nosso Instagram<br>
                    <span class="text-sm md:text-base font-normal">e ajude a compartilhar o amor</span>
                </p>
            </div>

            <svg class="w-8 h-8 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
            </svg>
        </a>
    </div>
</footer>

</body>
</html>
