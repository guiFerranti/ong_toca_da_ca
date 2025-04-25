@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Área Administrativa</h1>
        <p>Bem-vindo à área administrativa do sistema.</p>

        <h2>Usuários</h2>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    </div>
@endsection
