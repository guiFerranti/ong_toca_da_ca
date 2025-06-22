@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detalhes do Formulário</h1>
                    <p class="text-gray-600">ID: {{ $form->id }}</p>
                    <p class="text-gray-600">Data: {{ $form->created_at->format('d/m/Y H:i') }}</p>

                    <!-- Informações do Pet -->
                    @if($form->pet)
                        <div class="mt-2">
                            <p class="text-gray-600">Animal:
                                <a href="{{ route('admin.animals.edit', $form->pet->id) }}"
                                   class="text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $form->pet->nome }} ({{ $form->pet->tipo }})
                                </a>
                            </p>
                        </div>
                    @endif
                </div>

                <select class="status-select border rounded px-2 py-1 text-sm
                {{ $form->status === 'Não lido' ? 'bg-red-100 text-red-800' :
                   ($form->status === 'Lido' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}"
                        data-type="{{ $type }}"
                        data-id="{{ $form->id }}">
                    <option value="Não lido" {{ $form->status === 'Não lido' ? 'selected' : '' }}>Não lido</option>
                    <option value="Lido" {{ $form->status === 'Lido' ? 'selected' : '' }}>Lido</option>
                    <option value="Concluído" {{ $form->status === 'Concluído' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>

            <div class="space-y-8">
                @foreach($fieldGroups as $groupName => $fields)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="bg-gray-100 px-4 py-3 border-b">
                            <h3 class="text-lg font-medium text-gray-900">{{ $groupName }}</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                            @foreach($fields as $field)
                                @if(array_key_exists($field, $fieldLabels))
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            {{ $fieldLabels[$field] }}
                                        </label>
                                        <p class="text-gray-900">
                                            @php
                                                $value = $form->{$field};
                                            @endphp

                                            @if(is_null($value))
                                                <span class="text-gray-400">Não preenchido</span>
                                            @elseif($value === 0 || $value === '0' || $value === false)
                                                <span class="text-red-500">Não</span>
                                            @elseif($value === 1 || $value === '1' || $value === true)
                                                <span class="text-green-600">Sim</span>
                                            @elseif($field === 'tipo_moradia')
                                                {{ $value === 'casa' ? 'Casa' : ($value === 'apartamento' ? 'Apartamento' : 'Sítio/Chácara') }}
                                            @elseif($field === 'tipo_imovel')
                                                {{ $value == 1 ? 'Próprio' : 'Alugado' }}
                                            @elseif($field === 'frequencia')
                                                {{ $value === 'Semanal' ? 'Semanal' : ($value === 'Quinzenal' ? 'Quinzenal' : ($value === 'Mensal' ? 'Mensal' : 'Única')) }}
                                            @else
                                                {{ $value }}
                                            @endif
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('admin.animals.forms.index', ['type' => $type]) }}"
                   class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                    Voltar
                </a>

                @if($form->pet)
                    <a href="{{ route('admin.animals.edit', $form->pet->id) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                        </svg>
                        Editar Animal
                    </a>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.status-select').addEventListener('change', function () {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const status = this.value;

            fetch(`/admin/animals/forms/${type}/${id}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({status: status})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.className = `border rounded px-2 py-1 text-sm ${
                            data.new_status === 'Não lido' ? 'bg-red-100 text-red-800' :
                                data.new_status === 'Lido' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'
                        }`;
                    }
                });
        });
    </script>
@endsection
