@extends('admin.layouts.app')

@section('content')
    <h1>Editar Conteúdo: {{ $content->key }}</h1>

    <form action="{{ route('admin.contents.update', $content) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="value">Valor</label>
            @if(str_contains($content->key, 'link'))
                <input type="url" name="value" id="value" class="form-control"
                       value="{{ old('value', $content->value) }}" required>
            @else
                <textarea name="value" id="value" class="form-control" rows="5"
                          required>{{ old('value', $content->value) }}</textarea>
            @endif
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" id="description" class="form-control"
                   value="{{ old('description', $content->description) }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
