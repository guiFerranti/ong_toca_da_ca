<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Admin Dashboard") - Toca da Ca</title>
    <link rel="icon" href="{{ asset('imgs/favicon.jpg') }}" type="image/png">

    @if (session('success'))
        <meta name="success" content="{{ session('success') }}">

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <meta name="error" content="{{ session('error') }}">
    @endif

    {{--<script src="https://cdn.tailwindcss.com"></script>--}}
    @vite(['resources/css/app.css'])
    @yield('head')
</head>
@php
    $adminRoutes = [
        [
            'label' => 'Animais',
            'icon' => asset(''),
            'route' => route('admin.animals.index'),
            'name' => 'admin.animals.index',
            'admin_only' => false
        ],
        [
            'label' => 'Formulários',
            'icon' => asset(''),
            'route' => route('admin.animals.forms.index'),
            'name' => 'admin.animals.forms.index',
            'admin_only' => false
        ],
        [
            'label' => 'Prestação de contas',
            'icon' => asset(''),
            'route' => route('admin.accountability.index'),
            'name' => 'admin.accountability.index',
            'admin_only' => false
        ],
        [
            'label' => 'Administradores',
            'icon' => asset(''),
            'route' => route('admin.users.index'),
            'name' => 'admin.users.index',
            'admin_only' => true
        ],
        [
            'label' => 'Conteúdo gerenciável',
            'icon' => asset(''),
            'route' => route('admin.contents.index'),
            'name' => 'admin.contents.index',
            'admin_only' => false
        ],
    ];
@endphp
<body class="bg-gray-100">
<div class="flex min-h-screen">
    <aside class="w-64 bg-gray-800 text-white">
        <div class="p-6">
            <div class="text-xl font-bold mb-4 min-h-[130px]">
                <img src="{{ asset('imgs/logo.jpg') }}" alt="Admin Logo" class="w-32 mx-auto">
            </div>
            <nav class="mt-8">
                <ul>
                    @php
                        use Illuminate\Support\Str;

                        $currentRouteName = request()->route()->getName();

                        $prefixes = collect($adminRoutes)->map(function($route) {
                            $parts = explode('.', $route['name']);
                            return [
                                'full_prefix' => implode('.', array_slice($parts, 0, -1)),
                                'length' => count($parts) - 1
                            ];
                        })->toArray();
                    @endphp

                    @foreach ($adminRoutes as $route)
                        @php
                            $isAdmin = auth()->user() instanceof \App\Models\Admin;
                            if ($route['admin_only'] && !$isAdmin) {
                                continue;
                            }

                            $parts = explode('.', $route['name']);
                            $fullPrefix = implode('.', array_slice($parts, 0, -1));
                            $prefixLength = count($parts) - 1;

                            $isActive = $currentRouteName === $route['name'];

                            if (!$isActive && $prefixLength > 0) {
                                $matchesThisPrefix = Str::startsWith($currentRouteName, $fullPrefix . '.');

                                $hasLongerMatch = false;
                                foreach ($prefixes as $prefix) {
                                    if ($prefix['length'] > $prefixLength &&
                                        Str::startsWith($currentRouteName, $prefix['full_prefix'] . '.')) {
                                        $hasLongerMatch = true;
                                        break;
                                    }
                                }

                                $isActive = $matchesThisPrefix && !$hasLongerMatch;
                            }
                        @endphp

                        <li class="mb-4">
                            <a href="{{ $route['route'] }}"
                               class="block py-2 px-4 rounded hover:bg-gray-700 transition {{ $isActive ? 'bg-gray-700' : '' }}">
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
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.notifications.index') }}" class="relative text-gray-700 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    @php
                        $unreadCount = auth()->user()->notifications()->where('is_read', false)->count();
                    @endphp
                    @if($unreadCount > 0)
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                    {{ $unreadCount }}
                </span>
                    @endif
                </a>

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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
        @endif

        @if(session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
        @endif
    });
</script>
</html>
