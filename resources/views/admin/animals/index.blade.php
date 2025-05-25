@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Animais</h1>

        <a href="{{ route('admin.animals.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Animal</a>

        <table class="w-full border-collapse">
            <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Imagem</th>
                <th class="border px-4 py-2">Tipo</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Nascimento</th>
                <th class="border px-4 py-2">Idade</th>
                <th class="border px-4 py-2">Sexo</th>
                <th class="border px-4 py-2">Ações</th>
                <th class="border px-4 py-2">Ativo</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($animals as $animal)
                <tr>
                    <td class="border px-4 py-2 text-center">{{ $animal->id }}</td>
                    <td class="border px-4 py-2">
                        @if($animal->img_perfil)
                            <img src="{{ asset('storage/'.$animal->img_perfil) }}" alt="Imagem de {{ $animal->nome }}"
                                 class="w-16 h-16 object-cover rounded-lg mx-auto">
                        @else
                            <span class="text-gray-400 italic">Sem imagem</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-center">{{ $animal->tipo }}</td>
                    <td class="border px-4 py-2">{{ $animal->nome ?? '-' }}</td>
                    <td class="border px-4 py-2 text-center">
                        {{ $animal->data_nascimento ? \Carbon\Carbon::parse($animal->data_nascimento)->format('d/m/Y') : '-' }}
                    </td>

                    @php
                        $nascimento = \Carbon\Carbon::parse($animal->data_nascimento);
                        $hoje = \Carbon\Carbon::now();
                        $diff = $nascimento->diff($hoje);

                        $anos = $diff->y;
                        $meses = $diff->m;
                    @endphp

                    <td class="border px-4 py-2 text-center">
                        @if ($anos >= 1)
                            {{ $anos }} {{ $anos === 1 ? 'ano' : 'anos' }}
                        @else
                            {{ $meses }} {{ $meses === 1 ? 'mês' : 'meses' }}
                        @endif
                    </td>

                    <td class="border px-4 py-2 text-center">{{ $animal->sexo ?? '-' }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex items-center justify-center gap-2 h-full">
                            <a href="{{ route('admin.animals.edit', $animal->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors h-10 flex items-center justify-center">
                                Editar
                            </a>

                            <form action="{{ route('admin.animals.destroy', $animal->id) }}" method="POST" class="h-10">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors h-full w-full flex items-center justify-center">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </td>

                    <td class="border px-4 py-2">
                        <div class="flex items-center justify-center">
                            <label class="toggle-switch">
                                <input
                                    type="checkbox"
                                    class="toggle-status-btn"
                                    data-id="{{ $animal->id }}"
                                    {{ $animal->is_active ? 'checked' : '' }}
                                >
                                <span class="slider"></span>
                            </label>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-4">Nenhum animal cadastrado.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $animals->links() }}
        </div>
    </div>
@endsection
<style>
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #16a34a;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.toggle-status-btn');

        toggles.forEach(toggle => {
            toggle.addEventListener('change', function (event) {
                const id = this.dataset.id;
                const switchElement = this.parentElement.querySelector('.slider');

                fetch(`/admin/animals/${id}/toggle-status`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.checked = data.status === 'Ativo';
                            switchElement.style.backgroundColor = this.checked ? '#16a34a' : '#ccc';
                        } else {
                            this.checked = !this.checked;
                        }
                    })
                    .catch(err => {
                        console.error('Erro ao alternar status:', err);
                        this.checked = !this.checked;
                    });
            });
        });
    });
</script>
