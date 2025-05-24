@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6">Questionário para Adoção de Pet</h1>

        <form action="{{ route('adocao.store') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="id_pet" value="{{ $id_pet }}">

            <div>
                <h2 class="text-xl font-semibold mb-4">Informações Pessoais</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="nome" placeholder="Nome completo" class="input" required>
                    <input type="number" name="idade" placeholder="Idade" class="input" required>
                    <input type="text" name="profissao" placeholder="Profissão" class="input">
                    <input type="text" name="telefone" placeholder="Telefone" class="input" required>
                    <input type="email" name="email" placeholder="E-mail" class="input" required>
                    <input type="text" name="endereco" placeholder="Endereço completo" class="input" required>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div>
                        <label>Mora em:</label><br>
                        <label><input type="radio" name="tipo_residencia" value="casa"> Casa</label>
                        <label class="ml-4"><input type="radio" name="tipo_residencia" value="apartamento"> Apartamento</label>
                        <label class="ml-4"><input type="radio" name="tipo_residencia" value="sitio"> Sítio/Chácara</label>
                    </div>
                    <div>
                        <label>Imóvel:</label><br>
                        <label><input type="radio" name="imovel_proprio" value="1"> Próprio</label>
                        <label class="ml-4"><input type="radio" name="imovel_proprio" value="0"> Alugado</label>
                    </div>
                </div>

                <div class="mt-2">
                    <label>Se alugado, o proprietário permite animais?</label><br>
                    <label><input type="radio" name="permite_animais" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="permite_animais" value="0"> Não</label>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Sobre o Pet</h2>
                <label><input type="radio" name="tipo_pet" value="cao"> Cão</label>
                <label class="ml-4"><input type="radio" name="tipo_pet" value="gato"> Gato</label>
                <input type="text" name="nome_pet" placeholder="Nome do pet" class="input mt-2">
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Sobre o Lar</h2>
                <input type="number" name="qtd_pessoas" placeholder="Quantas pessoas moram na casa?" class="input">
                <div class="mt-2">
                    <label>Todos estão de acordo com a adoção?</label><br>
                    <label><input type="radio" name="todos_de_acordo" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="todos_de_acordo" value="0"> Não</label>
                </div>
                <div class="mt-2">
                    <label>Há crianças?</label><br>
                    <label><input type="radio" name="tem_criancas" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="tem_criancas" value="0"> Não</label>
                </div>
                <div class="mt-2">
                    <label>Possui outros animais?</label><br>
                    <label><input type="radio" name="tem_animais" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="tem_animais" value="0"> Não</label>
                    <input type="text" name="quais_animais" placeholder="Quais e quantos?" class="input mt-2">
                </div>
                <div class="mt-2">
                    <label>Todos os animais são vacinados e castrados?</label><br>
                    <label><input type="radio" name="vacinados_castrados" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="vacinados_castrados" value="0"> Não</label>
                </div>
                <input type="text" name="onde_dia" placeholder="Onde o pet ficará durante o dia?" class="input mt-2">
                <input type="text" name="onde_noite" placeholder="E durante a noite?" class="input mt-2">
                <div class="mt-2">
                    <label>O pet terá acesso ao interior da casa?</label><br>
                    <label><input type="radio" name="acesso_interior" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="acesso_interior" value="0"> Não</label>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Compromisso</h2>
                <div class="space-y-2">
                    <label>Está ciente de que o pet pode viver 10 anos ou mais?</label><br>
                    <label><input type="radio" name="consciencia_longevidade" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="consciencia_longevidade" value="0"> Não</label><br>

                    <label>Tem condições financeiras?</label><br>
                    <label><input type="radio" name="condicao_financeira" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="condicao_financeira" value="0"> Não</label><br>

                    <label>Já teve que doar ou abandonar um animal?</label><br>
                    <label><input type="radio" name="ja_abandonou" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="ja_abandonou" value="0"> Não</label>
                    <input type="text" name="motivo_abandono" placeholder="Por quê?" class="input mt-2"><br>

                    <label>Está de acordo com o termo de responsabilidade?</label><br>
                    <label><input type="radio" name="aceita_termos" value="1"> Sim</label>
                    <label class="ml-4"><input type="radio" name="aceita_termos" value="0"> Não</label>
                </div>
            </div>

            <button type="submit" class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Enviar formulário
            </button>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .input {
            @apply w-full border border-gray-300 rounded px-3 py-2;
        }
    </style>
@endpush
