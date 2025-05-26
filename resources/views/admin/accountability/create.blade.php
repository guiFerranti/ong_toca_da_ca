@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <h1>Nova Prestação de Contas</h1>

        <form method="POST" action="{{ route('admin.accountability.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="payment_date" class="form-label">Data do Pagamento</label>
                <input type="date" class="form-control" id="payment_date" name="payment_date" required>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Valor</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Comprovante</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('admin.accountability.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
