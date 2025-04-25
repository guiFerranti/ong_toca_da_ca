<!-- resources/views/admin/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-purple-50">
        <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-b74bff mb-6">Admin Login</h2>

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-b74bff focus:border-transparent"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-b74bff focus:border-transparent"
                        required
                    >
                    @error('password')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-b74bff text-white font-semibold py-2 px-4 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-b74bff focus:ring-opacity-50">
                    Entrar
                </button>
            </form>
        </div>
    </div>
@endsection
