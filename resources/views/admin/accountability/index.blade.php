@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Prestação de Contas</h1>

        <div class="mb-4">
            <a href="{{ route('admin.accountability.create') }}" class="btn btn-success">
                Novo Registro
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Comprovante</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>{{ $entry->payment_date->format('d/m/Y') }}</td>
                        <td>R$ {{ number_format($entry->amount, 2, ',', '.') }}</td>
                        <td>{{ Str::limit($entry->description, 50) }}</td>
                        <td>
                        <span class="badge
                            @if($entry->status === 'approved') bg-success
                            @elseif($entry->status === 'rejected') bg-danger
                            @else bg-warning @endif">
                            {{ ucfirst($entry->status) }}
                        </span>
                        </td>
                        <td>
                            <a href="{{ $entry->image_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                Ver Imagem
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.accountability.edit', $entry->id) }}"
                               class="btn btn-sm btn-primary">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
