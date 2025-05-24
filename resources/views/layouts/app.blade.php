<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Sistema</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

<!-- Header -->
<header class="bg-[#bc7af8] text-white shadow-md h-[300px] px-64">
    <div class="flex">
        <div class="flex flex-col">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Admin Logo" class="w-32 mx-auto">
            <span class="text-4xl font-bold">
                Transforme vidas.
            </span>
            <span class="text-4xl font-bold">
                Adote um amigo!
            </span>
            <span class="font-bold">
                Conheça cães e gatos <br />
                esperando um lar cheio de amor.
            </span>
            <div class="flex items-center justify-center">
                <a href="">
                    <button class="bg-[#0c9d44] rounded-full px-3 py-1">
                        Quero adotar
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>

<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-[#a516e6] text-white py-4 text-center">
</footer>

</body>
</html>
