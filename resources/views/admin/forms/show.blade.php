@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detalhes do Formulário</h1>
                    <p class="text-gray-600">ID: {{ $form->id }}</p>
                    <p class="text-gray-600">Data: {{ $form->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <select class="status-select border rounded px-2 py-1 text-sm
                {{ $form->status || $form->status === 'Não lido' ? 'bg-red-100 text-red-800' :
                   ($form->status === 'Lido' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}"
                        data-type="{{ $type }}"
                        data-id="{{ $form->id }}">
                    <option value="Não lido" {{ $form->status === 'Não lido' ? 'selected' : '' }}>Não lido</option>
                    <option value="Lido" {{ $form->status === 'Lido' ? 'selected' : '' }}>Lido</option>
                    <option value="Concluído" {{ $form->status === 'Concluído' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($form->getAttributes() as $key => $value)
                    @if(!in_array($key, ['id', 'created_at', 'updated_at', 'status']))
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                            <p class="text-gray-900">{{ $value ?? 'N/A' }}</p>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.animals.forms.index', ['type' => $type]) }}"
                   class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                    Voltar
                </a>
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
