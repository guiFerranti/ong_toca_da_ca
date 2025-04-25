<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Sistema</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">

<!-- Header -->
<header class="bg-[#b74bff] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <h1 class="text-xl font-semibold">Administração do Sistema</h1>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="bg-[#b74bff] text-white py-4 text-center">
    <p>&copy; {{ date('Y') }} Sistema - Todos os direitos reservados.</p>
</footer>
</body>
</html>
