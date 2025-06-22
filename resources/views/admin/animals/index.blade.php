@extends('layouts.app-admin')

@section('content')
    <div class="W-FULL px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Animais</h1>

            <a href="{{ route('admin.animals.create') }}"
               class="mt-4 md:mt-0 bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition duration-150 ease-in-out">
                Novo Animal
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Imagem</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nascimento</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Idade</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sexo</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ativo</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @forelse ($animals as $animal)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $animal->id }}</td>
                        <td class="px-6 py-4">
                            @if($animal->img_perfil)
                                <img src="{{ asset('storage/'.$animal->img_perfil) }}"
                                     alt="Imagem de {{ $animal->nome }}"
                                     class="w-16 h-16 object-cover rounded-lg mx-auto">
                            @else
                                <span class="text-gray-400 italic">Sem imagem</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $animal->tipo }}</td>
                        <td class="px-6 py-4">{{ $animal->nome ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            {{ $animal->data_nascimento ? \Carbon\Carbon::parse($animal->data_nascimento)->format('d/m/Y') : '-' }}
                        </td>

                        @php
                            $nascimento = \Carbon\Carbon::parse($animal->data_nascimento);
                            $hoje = \Carbon\Carbon::now();
                            $diff = $nascimento->diff($hoje);

                            $anos = $diff->y;
                            $meses = $diff->m;
                        @endphp

                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if ($anos >= 1)
                                {{ $anos }} {{ $anos === 1 ? 'ano' : 'anos' }}
                            @else
                                {{ $meses }} {{ $meses === 1 ? 'mês' : 'meses' }}
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $animal->sexo ?? '-' }}</td>

                        <td class="px-6 py-4 whitespace-nowrap">
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

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2 h-full justify-center">
                                <a href="{{ route('admin.animals.edit', $animal->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors h-10 flex items-center justify-center">
                                    Editar
                                </a>

                                <form action="{{ route('admin.animals.destroy', $animal->id) }}" method="POST"
                                      class="h-10 flex items-center justify-center p-0 m-0"
                                      id="delete-form-{{ $animal->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            onclick="confirmDelete({{ $animal->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors h-full w-full flex items-center justify-center m-0">
                                        Deletar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">Nenhum animal cadastrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

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

    function confirmDelete(animalId) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${animalId}`).submit();
            }
        });
    }
</script>
