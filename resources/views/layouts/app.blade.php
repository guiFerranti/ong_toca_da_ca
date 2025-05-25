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
    <div class="container flex justify-between mx-auto px-4 md:px-6 lg:px-64 py-8 relative">
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

        <div class="absolute bottom-0 right-0">
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

<footer class="bg-[#a516e6] text-white py-4 text-center">
    © {{ date('Y') }} ONG - Todos os direitos reservados
</footer>

</body>
</html>
