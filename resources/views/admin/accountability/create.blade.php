@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4 max-w-4xl">
        <h1 class="text-xl md:text-2xl font-bold mb-4 md:mb-6 text-gray-800">Nova Prestação de Contas</h1>

        <form method="POST" action="{{ route('admin.accountability.store') }}" enctype="multipart/form-data"
              class="bg-white rounded-lg shadow-md p-4 md:p-6 space-y-4 md:space-y-6">
            @csrf

            <div class="space-y-4 md:space-y-6">
                <div>
                    <label for="payment_date" class="block text-gray-700 font-medium mb-1 md:mb-2">Data do Pagamento
                        *</label>
                    <input type="date" id="payment_date" name="payment_date" value="{{ old('payment_date') }}"
                           class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    @error('payment_date')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="amount" class="block text-gray-700 font-medium mb-1 md:mb-2">Valor *</label>
                    <input type="number" step="0.01" id="amount" name="amount" value="{{ old('amount') }}"
                           class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    @error('amount')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-gray-700 font-medium mb-1 md:mb-2">Descrição *</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full text-sm md:text-base border border-gray-300 rounded px-3 py-2 md:px-4 md:py-2 focus:outline-none focus:ring-1 md:focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-1 md:mb-2">Comprovante *</label>
                    <div class="flex flex-col gap-2">
                        <input type="file" id="image" name="image"
                               class="block w-full text-sm text-gray-500
                                   file:mr-2 file:py-1 file:px-3 md:file:py-2 md:file:px-4
                                   file:rounded file:border-0
                                   file:text-xs md:file:text-sm file:font-medium
                                   file:bg-blue-50 file:text-blue-700
                                   hover:file:bg-blue-100"
                        >
                        @error('image')
                        <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4 md:pt-6 gap-3">
                <a href="{{ route('admin.accountability.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 md:px-6 rounded shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 text-sm md:text-base">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 md:px-6 rounded shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-sm md:text-base">
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
