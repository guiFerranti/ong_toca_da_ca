@extends('layouts.app-admin')

@section('content')
    <div class="px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Gerenciamento de Formulários</h1>

            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="?type=adocao"
                   class="px-4 py-2 rounded-lg {{ $type === 'adocao' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                    Adoções
                </a>
                <a href="?type=apadrinhamento"
                   class="px-4 py-2 rounded-lg {{ $type === 'apadrinhamento' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                    Apadrinhamentos
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ações</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($forms as $form)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $form->id }}</td>
                        <td class="px-6 py-4">{{ $form->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">{{ $form->nome }}</td>
                        <td class="px-6 py-4">
                            <select class="status-select border rounded px-2 py-1 text-sm
                            {{ !$form->status || $form->status === 'Não lido' ? 'bg-red-100 text-red-800' :
                               ($form->status === 'Lido' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}"
                                    data-type="{{ $type }}"
                                    data-id="{{ $form->id }}">
                                <option value="Não lido" {{ $form->status === 'Não lido' ? 'selected' : '' }}>Não lido
                                </option>
                                <option value="Lido" {{ $form->status === 'Lido' ? 'selected' : '' }}>Lido</option>
                                <option value="Concluído" {{ $form->status === 'Concluído' ? 'selected' : '' }}>
                                    Concluído
                                </option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 h-full justify-center">
                                <a href="{{ route('admin.animals.forms.show', [$type, $form->id]) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md transition-colors h-10 flex items-center justify-center">
                                    Ver detalhes
                                </a>

                                <form action="{{ route('admin.animals.forms.destroy', [$type, $form->id]) }}"
                                      method="POST"
                                      class="h-10"
                                      id="delete-form-{{ $form->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors h-full w-full flex items-center justify-center"
                                            onclick="confirmDeleteForm('{{ $form->id }}', '{{ addslashes($type) }}')">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $forms->links() }}
        </div>
    </div>

    <script>
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', function () {
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
                console.log('teste');
            });
        });

        function confirmDeleteForm(formId, type) {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você está prestes a excluir este formulário. Esta ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar',
                backdrop: `
        rgba(0,0,0,0.5)
        url("{{ asset('images/nyan-cat.gif') }}")
        left top
        no-repeat
    `
            }).then((result) => {
                if (result.isConfirmed) {
                    // Encontra o formulário correto pelo ID e submete
                    document.getElementById(`delete-form-${formId}`).submit();

                    // Mostra loader enquanto processa
                    Swal.fire({
                        title: 'Excluindo...',
                        html: 'Por favor, aguarde enquanto processamos sua solicitação.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });
                }
            });
        }
    </script>
@endsection
