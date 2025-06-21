@extends('admin.layouts.app')

@section('content')
    <h1>Conteúdos Gerenciáveis</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Chave</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contents as $content)
            <tr>
                <td>{{ $content->key }}</td>
                <td>{{ $content->description }}</td>
                <td>
                    <a href="{{ route('admin.contents.edit', $content) }}" class="btn btn-sm btn-primary">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
