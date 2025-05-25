<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Admin Dashboard") - Toca da Ca</title>

    @if (session('success'))
        <meta name="success" content="{{ session('success') }}">
    @endif

    @if (session('error'))
        <meta name="error" content="{{ session('error') }}">
    @endif

    {{--<script src="https://cdn.tailwindcss.com"></script>--}}
    @vite('resources/css/app.css')
    @yield('head')
</head>
@php
    $adminRoutes = [
        [
            'label' => 'Animais',
            'icon'  => asset(''),
            'route' => route('admin.animals.index'),
        ],
        [    'label' => 'Formulários',
            'icon'  => asset(''),
            'route' => route('admin.animals.forms.index'),
        ],
        [    'label' => 'Prestação de contas',
            'icon'  => asset(''),
            //'route' => route('admin.contas.index'),
            'route' => '',
        ],
        [
            'label' => 'Administradores',
            'icon'  => asset(''),
            //'route' => route('admin.admins.index'),
            'route' => '',
        ],
    ];
@endphp
<body class="bg-gray-100">
<div class="flex min-h-screen">
    <aside class="w-64 bg-gray-800 text-white">
        <div class="p-6">
            <div class="text-xl font-bold mb-4">
                <img src="{{ asset('imgs/logo.jpg') }}" alt="Admin Logo" class="w-32 mx-auto">
            </div>
            <nav class="mt-8">
                <ul>
                    @foreach ($adminRoutes as $route)
                        <li class="mb-4">
                            <a href="{{ $route['route'] }}"
                               class="block py-2 px-4 rounded hover:bg-gray-700 transition">
                                {{ $route['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-primary">@yield('content-title', 'Admin Dashboard')</h1>
            <div class="flex items-center">
                <a href="{{ route('admin.index') }}" class="text-gray-700 hover:text-gray-900">
                    <img src="{{ asset('imgs/profiles/no-image.png') }}" alt="Admin Avatar"
                         class="w-10 h-10 rounded-full">
                </a>
                <a href="{{ route('admin.logout') }}" class="ml-4 text-red-600 hover:text-red-800">Logout</a>
            </div>
        </header>

        <main class="flex-1 p-6 bg-gray-100 text-gray-700">
            @yield('content')
        </main>
    </div>
</div>

@vite('resources/js/app.js')
@yield('scripts')
</body>
</html>
