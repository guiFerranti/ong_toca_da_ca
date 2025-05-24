@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-semibold mb-4">Formulário de Apadrinhamento</h1>

        <form action="{{ route('apadrinhamento.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="id_pet" value="{{ $id_pet }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block">Nome completo</label>
                    <input type="text" name="nome" class="input" required>
                </div>

                <div>
                    <label class="block">Data de nascimento</label>
                    <input type="date" name="nascimento" class="input" required>
                </div>

                <div>
                    <label class="block">CPF</label>
                    <input type="text" name="cpf" class="input" required>
                </div>

                <div>
                    <label class="block">Telefone</label>
                    <input type="text" name="telefone" class="input" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block">E-mail</label>
                    <input type="email" name="email" class="input w-full" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block">Endereço completo</label>
                    <input type="text" name="endereco" class="input w-full" required>
                </div>

                <div>
                    <label class="block">Tipo de pet</label>
                    <select name="tipo_pet" class="input" required>
                        <option value="Cão">Cão</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div>

                <div>
                    <label class="block">Nome do pet (opcional)</label>
                    <input type="text" name="nome_pet" class="input">
                </div>

                <div class="md:col-span-2">
                    <label class="block">Tipo de apadrinhamento</label>
                    <input type="text" name="tipo_apadrinhamento" class="input w-full" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block">Valor ou tipo de contribuição</label>
                    <input type="text" name="contribuicao" class="input w-full" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block">Frequência</label>
                    <select name="frequencia" class="input w-full" required>
                        <option value="Semanal">Semanal</option>
                        <option value="Quinzenal">Quinzenal</option>
                        <option value="Mensal">Mensal</option>
                        <option value="Única">Única</option>
                    </select>
                </div>

                <div>
                    <label class="block">Disposto a visitar o pet?</label>
                    <select name="visita_regular" class="input" required>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>

                <div>
                    <label class="block">Deseja receber atualizações?</label>
                    <select name="receber_atualizacoes" class="input" required>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block">Aceita o termo de compromisso?</label>
                    <select name="aceita_termos" class="input w-full" required>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Enviar
            </button>
        </form>
    </div>
@endsection
