@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Editar Registro</h1>

        <form method="POST" action="{{ route('admin.accountability.update', $accountability->id) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="payment_date" class="form-label">Data do Pagamento</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date"
                       value="{{ $accountability->payment_date->format('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Valor</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                       value="{{ $accountability->amount }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>
                {{ $accountability->description }}
            </textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Novo Comprovante (opcional)</label>
                <input type="file" class="form-control" id="image" name="image">
                <small class="form-text text-muted">
                    Deixe em branco para manter o comprovante atual
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('admin.accountability.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
